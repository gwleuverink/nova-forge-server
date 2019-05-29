<template>
    <div>
        <h1 class="mb-3 text-90 font-normal text-2xl">{{ __('Forge server') }}</h1>

        <card>
            <div class="border-b border-50">    

                <loading-view :loading="loading">

                    <div class="py-3 flex items-center border-b border-50">
                        <div class="flex items-center px-3">
                            <checkbox-with-label
                                :checked="selectAllChecked"
                                @change="toggleSelectAll">
                                {{ __('Select All') }}
                            </checkbox-with-label>
                        </div>

                        <div class="flex items-center ml-auto px-3">
                            <deploy-button
                                :sites="selectedSites"
                                :disabled="selectedSites.length === 0"
                            >
                            </deploy-button>
                        </div>
                    </div>

                    <div class="overflow-hidden overflow-x-auto relative">
                        <!-- Resource Table -->
                        <table
                            class="table w-full"
                            cellpadding="0"
                            cellspacing="0"
                            data-testid="resource-table" >

                            <thead>
                                <tr>
                                    <!-- Select Checkbox -->
                                    <th class="w-16">
                                        &nbsp;
                                    </th>

                                    <!-- Field Names -->
                                    <th>Name</th>
                                    <th>Id</th>
                                    <th>Branch</th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <tbody>

                                <site-table-row 
                                    v-for="site in sites" 
                                    ref="site-table-rows"
                                    :site="site"
                                    :key="site.id"
                                    @select="addToSelection"
                                    @deselect="removeFromSelection">
                                </site-table-row>

                            </tbody>
                        </table>
                    </div>
                </loading-view>
            </div>
        </card>
    </div>
</template>

<script>

import SiteTableRow from './SiteTableRow';
import DeployButton from './DeployButton';
// import findWhere from 'lodash/findKey'

export default {

    components: {
        'site-table-row': SiteTableRow,
        'deploy-button': DeployButton
    },

    data: () => ({
        loading: true,
        sites: null,
        selectedSites: [],
        selectAllChecked: false
    }),

    mounted() {        
        this.loadSites();
    },

    methods: {
        /**
         * Fetch sites from the webservice
         */
        loadSites: function() {
            
            Nova.request().get('nova-vendor/forge-server/get-sites').then(response => {

                this.sites = response.data;
                this.loading = false;
            })
        },

        /**
         * Select all sites
         */
        toggleSelectAll: function() {

            this.selectAllChecked = ! this.selectAllChecked;

            this.$refs['site-table-rows'].forEach(site => {
                site.toggleSelection(this.selectAllChecked);
            }, this)
        },

        /**
         * Add site id to selection 
         */
        addToSelection: function(siteId) {
            this.selectedSites.push(siteId);
        },

        /**
         * Remove site id from selection
         */
        removeFromSelection: function(siteId) {
            const removeKey = this.selectedSites.indexOf(siteId);
            this.selectedSites.splice(removeKey, 1);
        }
    }
}
</script>

<style>
/* Scoped Styles */
</style>
