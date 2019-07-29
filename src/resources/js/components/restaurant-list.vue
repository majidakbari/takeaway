<template>
    <b-container class="has-loading" :class="{loading: loading}">

        <b-form @submit.prevent="getList" @change="getList">

            <b-row class="pt-5 pb-3">
                <b-col md="4" class="mb-3">
                    <b-form-group label-cols-sm="3" label="Status" class="mb-0">
                        <b-form-select v-model="sort">
                            <option value="">Please select status</option>
                            <option v-for="(value, key) in status" :value="key">{{value}}</option>
                        </b-form-select>
                    </b-form-group>
                </b-col>

                <b-col md="4" class="mb-3">
                    <b-form-group label-cols-sm="3" label="Sort" class="mb-0">
                        <b-form-select v-model="sorting_value">
                            <option value="">Please select sorter</option>
                            <option v-for="(value, key) in sortValues" :value="key">{{value}}</option>
                        </b-form-select>
                    </b-form-group>
                </b-col>

                <b-col md="4" class="mb-3">
                    <b-form-group label-cols-sm="3" label="Search" class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="search" placeholder="Type to Search"></b-form-input>
                            <b-input-group-append>
                                <b-button variant="success" @click="getList">Search</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>

            </b-row>

        </b-form>


        <b-table
            show-empty
            stacked="md"
            :items="items"
            :fields="fields"
        >

            <template slot="status" slot-scope="row">
                {{status[row.item.status]}}
            </template>

            <template slot="details" slot-scope="row">
                {{sorting_value ? row.item.sortingValues[sorting_value] : null}}
            </template>

            <template slot="actions" slot-scope="row">
                <img
                    class="action-icon"
                    :src="icon.filled"
                    @click.prevent="unfavorite(row.item.name)"
                    v-if="row.item.isFavorite"
                />
                <img
                    class="action-icon"
                    :src="icon.empty"
                    @click.prevent="favorite(row.item.name)"
                    v-if="!row.item.isFavorite"
                />
                <div class="spinner" :class="{show: doing === row.item.name}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </template>

        </b-table>

    </b-container>
</template>

<script>
    import {restaurant} from '../api';
    import star from '../assets/star.svg';
    import emptyStar from '../assets/empty-star.svg';

    export default {
        props: {
            status: {
                type: Object,
                required: true,
            },
            sortValues: {
                type: Object,
                required: true,
            },
        },
        data() {
            return {
                sort: '',
                sorting_value: '',
                search: '',
                doing: '',
                loading: false,
                items: [],
                icon: {
                    empty: emptyStar,
                    filled: star,
                },
            }
        },
        computed: {
            fields() {
                const self = this;
                return [
                    {
                        key: 'name',
                        label: 'Restaurant Name',
                    },
                    {
                        key: 'status',
                        label: 'Status',
                        class: 'text-center',
                    },
                    ...(self.sorting_value ? [{
                        key: 'details',
                        class: 'text-center',
                        label: self.sorting_value ? self.sortValues[self.sorting_value] : 'Details',
                    }] : []),
                    {
                        key: 'actions',
                        label: 'Actions',
                        class: 'text-center',
                    },
                ]
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            fetchList() {
                this.loading = true;
                const params = this.getParams();
                restaurant.list({params})
                    .then((response) => {
                        this.loading = false;
                        this.doing = '';
                        this.items = response.data.data;
                    })
                    .catch(() => {
                        this.loading = false;
                        this.doing = '';
                    });
            },
            getParams() {
                const params = {};
                const {
                    search,
                    sort,
                    sorting_value,
                } = this;
                if (search) {
                    params.search = search;
                }
                if (sort) {
                    params.sort = sort;
                }
                if (sorting_value) {
                    params.sorting_value = sorting_value;
                }
                return params;
            },
            getList() {
                if (!this.loading) {
                    this.fetchList();
                }
            },
            favorite(name) {
                if (!this.doing) {
                    this.doing = name;
                    restaurant.favorite(name)
                        .then((response) => {
                            this.fetchList();
                        })
                        .catch(() => {
                            this.doing = '';
                        });
                }
            },
            unfavorite(name) {
                if (!this.doing) {
                    this.doing = name;
                    restaurant.unfavorite(name)
                        .then((response) => {
                            this.fetchList();
                        })
                        .catch(() => {
                            this.doing = '';
                        });
                }
            },
        }
    }
</script>
