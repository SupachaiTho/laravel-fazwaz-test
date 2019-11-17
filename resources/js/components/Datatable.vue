<template>
    <table class="table is-bordered data-table">
        <thead>
            <tr>
                <th>
                    <input class="input" type="text" v-model="tableData.filterTitle" placeholder="Filter Title"
                        @input="$emit('getProperties')">
                </th>
                <th>
                    <input class="input" type="text" v-model="tableData.filterDescription" placeholder="Filter Description"
                        @input="$emit('getProperties')">
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterBedroom" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="index in arrayNumber" :key="index" :value="index">{{index}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterBathroom" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="index in arrayNumber" :key="index" :value="index">{{index}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterType" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="type in propertyTypes" :key="type.id" :value="type.property_type_title">{{type.property_type_title}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterStatus" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="status in statuses" :key="status.id" :value="status.status_title">{{status.status_title}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterForSale" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="(bool, index) in arrayBoolean" :key="index" :value="numberToBoolean(index)">{{bool}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterForRent" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="(bool, index) in arrayBoolean" :key="index" :value="numberToBoolean(index)">{{bool}}</option>
                        </select>
                    </div>
                </th>
                <th>
                    <input class="input" type="text" v-model="tableData.filterProject" placeholder="Filter Project"
                    @input="$emit('getProperties')">
                </th>
                <th>
                    <div class="select">
                        <select v-model="tableData.filterCountry" @change="$emit('getProperties')">
                            <option selected :value="null">All</option>
                            <option v-for="country in countries" :key="country.id" :value="country.country_title">{{country.country_title}}</option>
                        </select>
                    </div>
                </th>
            </tr>
            <tr>
                <th v-for="column in columns" :key="column.name" @click="$emit('sort', column.name)"
                    :class="sortKey === column.name ? (sortOrders[column.name] < 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                    :style="'width:'+column.width+';'+'cursor:pointer;'">
                    {{column.label}}
                </th>
            </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
export default {
    props: [
            'columns',
            'sortKey',
            'sortOrders',
            'tableData',
            'propertyTypes',
            'statuses',
            'countries',
        ],
    data() {
        return {
            arrayNumber: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            arrayBoolean: ['No', 'Yes'],
        }
    },
    methods: {
        numberToBoolean(number) {
            return number === 1 ? true : false;
        }
    }
}
</script>