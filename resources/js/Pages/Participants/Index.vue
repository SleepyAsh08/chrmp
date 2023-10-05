<template>
    <Head>
        <title>Participants</title>
    </Head>

    <div class="row gap-10 masonry pos-r">
        <div class="peers fxw-nw jc-sb ai-c">
            <h3>Participants</h3>
            <div class="peers">
                <div class="peer mR-10">
                    <input v-model="search" type="text" class="form-control form-control-sm" placeholder="Search...">
                </div>
                <div class="peer">
                    <button class="btn btn-primary btn-sm mL-2 text-white" @click="showFilterP()">Print</button>
                    <button class="btn btn-primary btn-sm mL-2 text-white" @click="showModal()">Import</button>
                    <button class="btn btn-primary btn-sm mL-2 text-white" @click="showFilter()">Filter</button>
                </div>
            </div>
        </div>

        <FilterPrinting v-if="filter_p" @closeFilter="filter_p = false">
                Participant ID From
                <input type="number" v-model="id_from" class="form-control" />
                Participant ID to
                <input type="number" v-model="id_to" class="form-control" />
                <button class="btn btn-sm btn-primary mT-5 text-white" @click="printSubmit">Print Report</button>
            </FilterPrinting>

        <filtering v-if="filter" @closeFilter="filter = false">
            Filter by Chapter
            <select v-model="chapter"  class="form-control" @change="filterData()" >
            <option value="Davao de Oro">Davao de Oro</option>
            <option value="Davao del Norte">Davao del Norte</option>
            <option value="Davao del Sur/Occidental">Davao del Sur/Occidental</option>
            <option value="Davao Oriental">Davao Oriental</option>
            <option value="Davao City">Davao City</option>
            </select>
            <button class="btn btn-sm btn-primary mT-5 text-white" @click="clearFilter">Clear Filter</button>
        </filtering>

        <div class="col-12">
            <div class="bgc-white p-20 bd">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Participant ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Chapter</th>
                            <!-- <th scope="col" style="text-align: right">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dat in data.data">
                                    <td>{{ dat.idattend }}</td>
                                    <td>{{ dat.full_name }}</td>
                                    <td>{{ dat.Chapter }}</td>
                                    <!-- <td>
                                        <div class="dropdown dropstart" >
                                            <button class="btn btn-secondary btn-sm action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu action-dropdown"  aria-labelledby="dropdownMenuButton1">
                                                <li><Link class="dropdown-item" :href="`/output/${dat.id}/edit`">Edit</Link></li>
                                                <li><Link class="text-danger dropdown-item" @click="deleteOutput(dat.id)">Delete</Link></li>
                                            </ul>
                                        </div>
                                    </td> -->
                                </tr>
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <!-- read the explanation in the Paginate.vue component -->
                        <!-- <pagination :links="users.links" /> -->
                        <pagination :next="data.next_page_url" :prev="data.prev_page_url" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Modal v-if="displayModal" @close-modal-event="hideModal">
                <h1>Upload Excel File</h1><br>
                <form @submit.prevent="submit">
                    <input type="file" @input="form.myfile = $event.target.files[0]" @change="onFileChanged()"/>
                    <progress v-if="form.progress" class="form-control"  :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <button type="submit" class="btn btn-primary btn-sm mL-2 text-white" >Submit</button>
                </form>
            </Modal>
    <Modal v-if="displayModal1" @close-modal-event="hidePrintModal">
                <div class="d-flex justify-content-center">
                    <iframe :src="my_link" style="width:100%; height:450px" />
                </div>
            </Modal>

</template>

<script>
import Filtering from "@/Shared/Filter";
import FilterPrinting from "@/Shared/FilterPrint";
import Pagination from "@/Shared/Pagination";
import Modal from "@/Shared/PrintModal";
import { useRemember, useForm } from '@inertiajs/inertia-vue3'

export default {
    components: { Pagination, Filtering, Modal, FilterPrinting },
    props: {
        data: Object,
        users: Object,
        filters: Object,
        can: Object,
    },
    data() {
        return {
            search: this.$props.filters.search,
            filter_p: false,
            confirm: false,
            filter: false,
            displayModal: false,
            displayModal1: false,
            displayDisappModal: false,
            chapter: this.$props.filters.chapter,
            my_link: "",
            id_from: "",
            id_to: "",
            form: this.$inertia.form({
                myfile: null,
                name: null,
                avatar: null,
                type: true,
            }),
        };
    },
    watch: {
        search: _.debounce(function (value) {
            this.$inertia.get(
                "/participants",
                { search: value },
                {
                    preserveScroll: true,
                    preserveState: true,
                    replace: true,
                }
            );
        }, 300),
    },
    methods: {
        showFilter() {
            this.filter = !this.filter
        },
        async clearFilter() {
            this.chapter = "";
            this.filterData();
        },
        async filterData() {


            //alert(this.mfosel);
            this.$inertia.get(
                "/participants",
                {
                    chapter: this.chapter
                },
                {
                    preserveScroll: true,
                    preserveState: true,
                    replace: true,
                }
            );
        },


        onFileChanged() {
            this.form.myfile = this.$refs.myFile.files[0];
            console.log(this.form.myfile)
        },
        submit() {
            if (!this.form.myfile) {
                alert("No file chosen!");
            } else {
                this.form.post('/participants/import/file/data')
            }

        },
        showModal() {

            this.displayModal = true
        },
        hideModal() {
            this.displayModal = false
        },
        showFilterP() {
            // alert("show filter");
            this.filter_p = !this.filter_p
        },
        printSubmit() {
            this.my_link = this.viewlink(this.id_from, this.id_to);
            // alert(this.id_from, this.id_to);

            this.showPrintModal();
        },
        viewlink(id_from, id_to) {
            //var linkt ="abcdefghijklo534gdmoivndfigudfhgdyfugdhfugidhfuigdhfiugmccxcxcxzczczxczxczxcxzc5fghjkliuhghghghaaa555l&&&&-";
            var linkt = "http://";
            var jasper_ip = "122.53.120.27:8080/"
            // this.jasper_ip;
            var jasper_link = 'jasperserver/flow.html?pp=u%3DJamshasadid%7Cr%3DManager%7Co%3DEMEA%2CSales%7Cpa1%3DSweden&_flowId=viewReportFlow&_flowId=viewReportFlow&ParentFolderUri=%2Freports%2FCHRMP_Conference&reportUnit=%2Freports%2FCHRMP_Conference%2Fchrmp&standAlone=true&decorate=no&output=pdf';
            var params = '&id_from=' + id_from + '&id_to=' + id_to;
            var linkl = linkt + jasper_ip + jasper_link + params;

            return linkl;
        },

        showPrintModal() {
            this.displayModal1 = true;
        },
        hidePrintModal() {
            this.displayModal1 = false;
        },
    },

};
</script>
