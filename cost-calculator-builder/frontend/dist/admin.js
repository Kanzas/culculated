/*! For license information please see admin.js.LICENSE.txt */
    <div class="ccb-edit-field-alias" v-for="(item) in available_fields" :title="item.alias" @click="insertAtCursorDom(' ' + item.letter + ' ')" v-if="item.alias !== 'total'">\n
        <div class="ccb-edit-field-letter">\n
            <span>{{ item.letter }}</span>\n
        </div>\n
        <div class="ccb-edit-field-label">\n
            <span>{{ item.label }}</span>\n
        </div>\n
    </div>\n
    <div class="ccb-edit-field-alias" @click="insertAtCursorDom(' activatorRatio ')">\n
        <div class="ccb-edit-field-letter">\n
            <span>Activator</span>\n
        </div>\n
        <div class="ccb-edit-field-label">\n
            <span>Activator Ratio</span>\n
        </div>\n
    </div>\n
    <div class="ccb-edit-field-alias" @click="insertAtCursorDom(' thinnerRatio ')">\n
        <div class="ccb-edit-field-letter">\n
            <span>Thinner</span>\n
        </div>\n
        <div class="ccb-edit-field-label">\n
            <span>Thinner Ratio</span>\n
        </div>\n
    </div>\n
</template>\n