<?php

namespace cBuilder\Classes;

require_once CCB_PRO_PATH . '/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class CCBInvoice {
	public static function send_pdf() {
		check_ajax_referer( 'ccb_send_quote', 'nonce' );

		if ( isset( $_POST['action'] ) && 'ccb_send_pdf' === $_POST['action'] ) {
			$data       = json_decode( stripslashes( $_POST['data'] ) );
			$user_name  = filter_var( $data->name, FILTER_SANITIZE_STRING );
			$file_name  = filter_var( $data->fileName, FILTER_SANITIZE_STRING );
			$user_email = filter_var( $data->email, FILTER_SANITIZE_STRING );
			$user_mess  = filter_var( $data->message, FILTER_SANITIZE_STRING );
			$email_body = $user_name . PHP_EOL . $user_mess;
			$subject    = $file_name . ' PDF Quote';
			$from_email = filter_var( $data->emailFrom, FILTER_SANITIZE_STRING );
			$from_name  = filter_var( $data->fromName, FILTER_SANITIZE_STRING );
			$headers    = 'From: ' . $from_name .  ' <' . $from_email . '>' . "\r\n"; //phpcs:ignore

			add_filter( 'wp_mail', array( 'cBuilder\Classes\CCBInvoice', 'attachFilter' ) );

			remove_all_filters( 'wp_mail_from' );
			remove_all_filters( 'wp_mail_from_name' );

			$result = self::save_pdf( $data->pdfString, 'Pdf Quote' );

			$STRING_ATTACHMENT = array(
				'string'      => file_get_contents( $result['path'] ), //phpcs:ignore
				'filename'    => "{$file_name}.pdf",
				'encoding'    => 'base64',
				'type'        => 'application/pdf',
				'disposition' => 'attachment',
			);

			$email_send = wp_mail( $user_email, $subject, $email_body, $headers, $STRING_ATTACHMENT );

			if ( $email_send ) {
				wp_delete_attachment( $result['id'] );
			}
		}
	}

	public static function attachFilter( $atts ) {

		$attachment_arrays = array();
		if ( array_key_exists( 'attachments', $atts ) && isset( $atts['attachments'] ) && $atts['attachments'] ) {
			$attachments = $atts['attachments'];
			if ( is_array( $attachments ) && ! empty( $attachments ) ) {
				$is_multidimensional_array = count( $attachments ) == count( $attachments, COUNT_RECURSIVE ) ? false : true; //phpcs:ignore
				if ( ! $is_multidimensional_array ) {
					$attachments = array( $attachments );
				}
				foreach ( $attachments as $index => $attachment ) {
					if ( is_array( $attachment ) && ( array_key_exists( 'path', $attachment ) || array_key_exists( 'string', $attachment ) ) ) {
						$attachment_arrays[] = $attachment;
						if ( $is_multidimensional_array ) {
							unset( $atts['attachments'][ $index ] );
						} else {
							$atts['attachments'] = array();
						}
					}
				}
			}
			global $wp_mail_attachments;
			$wp_mail_attachments = $attachment_arrays;
			add_action(
				'phpmailer_init',
				function( \PHPMailer\PHPMailer\PHPMailer $phpmailer ) {
					$attachment_arrays = array();
					if ( array_key_exists( 'wp_mail_attachments', $GLOBALS ) ) {
						global $wp_mail_attachments;
						$attachment_arrays   = $wp_mail_attachments;
						$wp_mail_attachments = array();
					}

					foreach ( $attachment_arrays as $attachment ) {
						$is_filesystem_attachment = array_key_exists( 'path', $attachment ) ? true : false;
						try {
							$encoding    = $attachment['encoding'] ?? $phpmailer::ENCODING_BASE64;
							$type        = $attachment['type'] ?? '';
							$disposition = $attachment['disposition'] ?? 'attachment';

							if ( $is_filesystem_attachment ) {
								$phpmailer->addAttachment( ( $attachment['path'] ?? null ), ( $attachment['name'] ?? '' ), $encoding, $type, $disposition );
							} else {
								$phpmailer->addStringAttachment( ( $attachment['string'] ?? null ), ( $attachment['filename'] ?? '' ), $encoding, $type, $disposition );
							}
						} catch ( \PHPMailer\PHPMailer\Exception $e ) { continue; } //phpcs:ignore
					}
				}
			);
		}
		return $atts;
	}

	public static function send_pdf_front() {
		check_ajax_referer( 'ccb_send_invoice', 'nonce' );

		if ( isset( $_POST['action'] ) && 'ccb_send_invoice' === $_POST['action'] ) {
			$data       = json_decode( stripslashes( $_POST['data'] ) );
			$user_name  = strval( $data->name );
			$file_name  = strval( $data->title );
			$user_email = strval( $data->email );
			$user_mess  = strval( $data->message );
			$calc_id    = strval( $data->calc_id );
			$email_body = $user_name . PHP_EOL . $user_mess;
			$subject    = $file_name . ' PDF Quote';
			$from_email = get_option( 'admin_email' );
			$from_name  = strval( $data->fromName );

			$general_settings = get_option( 'ccb_general_settings' );

			if ( isset( $general_settings['invoice']['fromEmail'] ) && is_email( $general_settings['invoice']['fromEmail'] ) ) {
				$from_email = $general_settings['invoice']['fromEmail'];
			}

			$headers    = 'From: ' . $from_name .  ' <' . $from_email . '>' . "\r\n"; //phpcs:ignore

			add_filter( 'wp_mail', array( 'cBuilder\Classes\CCBInvoice', 'attachFilter' ) );

			remove_all_filters( 'wp_mail_from' );
			remove_all_filters( 'wp_mail_from_name' );

			$dompdf        = new Dompdf();
			$data          = json_decode( stripslashes( $_POST['data'] ) );
			$html          = $data->html;
			$fontDirectory = CCB_PRO_PATH . '/dompdf/vendor/dompdf/dompdf/lib/fonts/';
			$options       = $dompdf->getOptions();
			$options->setFontCache( $fontDirectory );
			$options->setChroot( $fontDirectory );
			$options->set( 'isRemoteEnabled', true );
			$options->set( 'pdfBackend', 'CPDF' );

			$dompdf->loadHtml( $html, 'UTF-8' );
			$dompdf->set_option( 'enable_remote', true );
			$dompdf->set_option( 'isHtml5ParserEnabled', true );

			$dompdf->render();

			$pdf_base64 = base64_encode( $dompdf->output() ); //phpcs:ignore

			$result = self::save_pdf( $pdf_base64, 'Pdf Quote' );

			$STRING_ATTACHMENT = array(//phpcs:ignore
				'string'      => file_get_contents( $result['path'] ), //phpcs:ignore
				'filename'    => "{$file_name}.pdf",
				'encoding'    => 'base64',
				'type'        => 'application/pdf',
				'disposition' => 'attachment',
			);

			$email_send = wp_mail( $user_email, $subject, $email_body, $headers, $STRING_ATTACHMENT );//phpcs:ignore
			if ( $email_send ) {
				do_action( 'ccb_after_send_invoice', $email_send, $user_email, $subject, $email_body, $headers, $STRING_ATTACHMENT, $result['path'], $calc_id );//phpcs:ignore
				wp_delete_attachment( $result['id'] );
			}
		}
	}

	public static function get_invoice() {
		check_ajax_referer( 'ccb_get_invoice', 'nonce' );

		$dompdf = new Dompdf();
		$data   = json_decode( stripslashes( $_POST['data'] ) );

		$html          = $data->html;
		$fontDirectory = CCB_PRO_PATH . '/dompdf/vendor/dompdf/dompdf/lib/fonts/';

		$options = $dompdf->getOptions();
		$options->setFontCache( $fontDirectory );
		$options->setChroot( $fontDirectory );
		$options->set( 'isRemoteEnabled', true );
		$options->set( 'pdfBackend', 'CPDF' );

		$dompdf->set_option( 'enable_remote', true );
		$dompdf->set_option( 'isHtml5ParserEnabled', true );
		$dompdf->loadHtml( $html, 'UTF-8' );

		$dompdf->render();

		wp_send_json(
			array(
				'base64PDF' => base64_encode( $dompdf->output() ), //phpcs:ignore
			)
		);
	}

	private static function save_pdf( $base64_img, $title ) {

		$upload_dir  = wp_upload_dir();
		$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

		$decoded         = base64_decode( $base64_img ); //phpcs:ignore
		$filename        = $title . '.pdf';
		$file_type       = 'application/pdf';
		$hashed_filename = md5( $filename . microtime() ) . '_' . $filename;

		$upload_file = file_put_contents( $upload_path . $hashed_filename, $decoded ); //phpcs:ignore

		$attachment = array(
			'post_mime_type' => 'application/pdf',
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $hashed_filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit',
			'guid'           => $upload_dir['url'] . '/' . basename( $hashed_filename ),
		);

		$result = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename );

		if ( $result ) {
			return array(
				'id'   => $result,
				'path' => $upload_dir['path'] . '/' . $hashed_filename,
			);
		}
	}
}
