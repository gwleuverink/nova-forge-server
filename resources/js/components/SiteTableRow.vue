<template>
    <tr>
        <td>
            <checkbox
                :checked="selected"
                @input="toggleSelection"
            />
        </td>

        <td>
            <a 
                :href="'//' + site.name" 
                class="text-primary dim no-underline"
                target="_blank" 
            >
                {{ site.name }}
            </a>
        </td>

        <td 
            v-text="site.id"
            class="text-center">
        </td>

        <td 
            v-text="site.attributes.repository_branch"
            class="text-center">
        </td>
        <td 
            v-text="site.status"
            class="text-center">
        </td>

    </tr>
</template>

<script>
export default {

    props: {
        site: { 
            Object, 
            required: true
        }
    },

    data: () => ({
        selected: false
    }),

    methods: {

        toggleSelection: function(selected = ! this.selected) {
            this.selected = selected;

            const event = this.selected ? 'select' : 'deselect';
            this.$emit(event, this.site.id)
        }
    }
}
</script>