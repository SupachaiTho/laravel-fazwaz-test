<template>
    <div class="projects">
        <datatable
            :columns="columns"
            :sortKey="sortKey"
            :sortOrders="sortOrders"
            :tableData="tableData"
            :propertyTypes="propertyTypes"
            :statuses="statuses"
            :countries="countries"
            @getProperties="getProperties"
            @sort="sortBy"
        >
            <tbody>
                <tr v-for="property in properties" :key="property.property_id">
                    <td>{{property.property_title}}</td>
                    <td>{{property.description}}</td>
                    <td>{{property.bedroom}}</td>
                    <td>{{property.bathroom}}</td>
                    <td>{{property.property_type_title}}</td>
                    <td>{{property.status_title}}</td>
                    <td>{{booleanTitle(property.for_sale)}}</td>
                    <td>{{booleanTitle(property.for_rent)}}</td>
                    <td>{{property.project_title}}</td>
                    <td>{{property.country_title}}</td>
                </tr>
            </tbody>
        </datatable>
        <pagination :pagination="pagination"
                    @prev="getProperties(pagination.prevPageUrl)"
                    @next="getProperties(pagination.nextPageUrl)">
        </pagination>
    </div>
</template>

<script>
import Datatable from './Datatable.vue';
import Pagination from './Pagination.vue';
export default {
    props: [
        'fetch_properties_url',
        'fetch_propertity_types_url',
        'fetch_statuses_url',
        'fetch_countries_url',
        ],
    components: { datatable: Datatable, pagination: Pagination },
    created() {
        this.getProperties();
        this.getPropertyTypes();
        this.getStatues();
        this.getCountries();
    },
    data() {
        let sortOrders = {};
        let columns = [
                {
                    width: '10%',
                    label: 'Title',
                    name: 'property_title',
                },
                {
                     width: '10%',
                    label: 'Description',
                    name: 'description',
                },
                {
                     width: '10%',
                    label: 'Bedroom',
                    name: 'bedroom',
                },
                {
                     width: '10%',
                    label: 'Bathroom',
                    name: 'bathroom',
                },
                {
                     width: '10%',
                    label: 'Type',
                    name: 'property_type_title',
                },
                {
                     width: '10%',
                    label: 'Status',
                    name: 'status_title',
                },
                {
                     width: '10%',
                    label: 'For Sale',
                    name: 'for_sale_title',
                },
                {
                     width: '10%',
                    label: 'For Rent',
                    name: 'for_rent_title',
                },
                {
                     width: '10%',
                    label: 'Project',
                    name: 'project_title',
                },
                {
                     width: '10%',
                    label: 'Country',
                    name: 'country_title',
                },
            ];

        columns.forEach((column) => {
           sortOrders[column.name] = -1;
        });

        return {
            properties: [],
            propertyTypes: [],
            statuses: [],
            countries: [],
            columns: columns,
            sortKey: 'property_title',
            sortOrders: sortOrders,
            tableData: {
                draw: 0,
                length: 20,
                column: 0,
                dir: 'asc',
                filterTitle: '',
                filterDescription: '',
                filterBedroom: null,
                filterBathroom: null,
                filterType: null,
                filterStatus: null,
                filterForSale: null,
                filterForRent: null,
                filterProject: '',
                filterCountry: null,
            },
            pagination: {
                lastPage: '',
                currentPage: '',
                total: '',
                lastPageUrl: '',
                nextPageUrl: '',
                prevPageUrl: '',
                from: '',
                to: ''
            },
        }
    },
    methods: {
        getProperties(url = this.fetch_properties_url) {
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.properties = data.data.data;
                        this.configPagination(data.data.pagination);
                    }
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getPropertyTypes(url = this.fetch_propertity_types_url) {
            axios.get(url)
                .then(response => {
                    let data = response.data;
                    this.propertyTypes = data.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getStatues(url = this.fetch_statuses_url) {
            axios.get(url)
                .then(response => {
                    let data = response.data;
                    this.statuses = data.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getCountries(url = this.fetch_countries_url) {
            axios.get(url)
                .then(response => {
                    let data = response.data;
                    this.countries = data.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        configPagination(data) {
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        sortBy(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = this.getIndex(this.columns, 'name', key);
            this.tableData.dir = this.sortOrders[key] === 1 ? 'desc' : 'asc';
            this.getProperties();
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
        },
        booleanTitle(bool) {
            return bool ? 'Yes' : 'No'
        }
    }
}
</script>