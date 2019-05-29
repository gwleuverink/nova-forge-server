<template>
    <div>
        <button
            @click="confirm"
            :disabled="working || disabled"
            type="button"
            class="btn btn-default btn-primary"
        >
            <loader v-if="working" width="30"></loader>
            <span v-else>{{ __('Deploy selected') }}</span>
        </button>

        <confirm-action-modal
            v-if="modalOpen"
            @confirm="deploy"
            @close="cancel"
            :working="working"
            :action="{
                name: 'Deploy site(s)?',
                fields: []
            }"
            :errors="{}"
            :selectedResources="[]"
            resource-name="forge sites"
        >
        </confirm-action-modal>
    </div>
</template>

<script>
export default {

    data: () => ({
        working: false,
        modalOpen: false,
    }),

    props: {
        sites: {
            Array,
            required: true
        },
        disabled: {
            Boolean,
            default: false
        }
    },

    methods: {
        /**
         * Open the confirm modal
         */
        confirm: function() {
            this.modalOpen = true;
        },

        /**
         * Execute the selected action.
         */
        deploy: function() {
            
            this.working = true;

            Nova.request().post('nova-vendor/forge-server/deploy-sites', {
                sites: this.sites
            }).then(response => {
                this.working = false;
                this.modalOpen = false;

                this.$toasted.show('Selected site(s) deployed!', { type: 'success' })
            })
        },

        /**
         * Close the modal.
         */
        cancel: function() {
            this.modalOpen = false;
        },
    }
}
</script>
