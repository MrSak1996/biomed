<template>
<div>
    <Header />
    <Sidebar />
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active">Create Job Order</li>
        </ol>
        <h1 class="page-header">Job Order: Create</h1>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-inverse" data-sortable-id="index-10">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">JOB ORDER FORM</h4>
                    </div>
                    <div class="panel-body">
                        <form @submit.prevent="form_submit()">
                            <div class="row">
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Control No.</label>
                                        <input type="text" class="form-control" readonly v-model="control_no">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <multiselect  v-model="sel_client" :options="options" label="label" :multiple="false"></multiselect>

                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Request Date</label>
                                        <input type="date" class="form-control" v-model="request_date">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" class="form-control" v-model="start_date">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Completed Date</label>
                                        <input type="date" class="form-control" v-model="completed_date">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Particulars</label>
                                        <textarea class="form-control" style="height: 236px;resize: none;" v-model="particulars"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Prepared By</label>
                                        <input type="text" class="form-control" v-model="request_by">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">

                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                        <label class="form-label">Received By</label>
                                        <input type="text" class="form-control" v-model="received_by" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<script>
import {
    start
} from "@popperjs/core";
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import Multiselect from 'vue-multiselect'

export default {
    name: 'Job Order',
    data() {
        return {
            sel_client: null,
            control_no: null,
            request_date: null,
            start_date: null,
            completed_date: null,
            received_by: null,
            request_by: null,
            particulars: null,
            options: [{
                    label: 'DESKTOP/LAPTOP REPAIR',
                    value: 1
                },
                {
                    label: 'HARDWARE INSTALLATION',
                    value: 2
                },
                {
                    label: 'PRINTER/SCANNER/COPIER',
                    value: 3
                },
            ]

        }
    },
    components: {
        Header,
        Sidebar,
        Multiselect
    },
    mounted() {
        this.generateNumber();
    },
    methods: {
        async generateNumber() {
            try {
                this.control_no = await this.$generateControlNO('generate_control_no', 'JOB-ORDER-');
            } catch (error) {
                console.error('Error generating number:', error);
            }
        },
        form_submit() {
            // const userId = localStorage.getItem('userId');
            const userId = 1;
            console.log(this.received_by);
            axios.post('/api/post_create_job_order', {
                control_no: this.control_no,
                form_request_date: this.request_date,
                form_start_date: this.start_date,
                form_completed_date: this.completed_date,
                form_received_by: this.received_by,
                form_request_by: this.request_by,
                form_particulars: this.particulars,
            }).then(() => {
                // this.showToatSuccess('Successfully created!');
                setTimeout(() => {
                    this.showSweetAlert('success');

                    this.$router.push({
                        name: 'Job Order'
                    });
                }, 1000); // Adjust the delay as needed

            }).catch((error) => {

            })

        },
        addSticky() {
            $.gritter.add({
                title: "This is a sticky notice!",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus lacus ut lectus rutrum placerat.",
                image: "../assets/img/user/user-2.jpg",
                sticky: true,
                time: "",
                class_name: "my-sticky-class"
            });
        },
        addRegular() {
            $.gritter.add({
                title: "This is a regular notice!",
                text: "This will fade out after a certain amount of time. Sed tempus lacus ut lectus rutrum placerat.",
                image: "../assets/img/user/user-3.jpg",
                sticky: false,
                time: ""
            });
        },
        addMax() {
            $.gritter.add({
                title: "This is a notice with a max of 3 on screen at one time!",
                text: "This will fade out after a certain amount of time. Sed tempus lacus ut lectus rutrum placerat.",
                sticky: false,
                image: "../assets/img/user/user-4.jpg",
                before_open: function () {
                    if (3 === $(".gritter-item-wrapper").length) return false;
                }
            });
        },
        addWithoutImage() {
            $.gritter.add({
                title: "This is a notice without an image!",
                text: "This will fade out after a certain amount of time."
            });
        },
        addGritterLight() {
            $.gritter.add({
                title: "This is a light notification",
                text: "Just add a 'gritter-light' class_name to your $.gritter.add or globally to $.gritter.options.class_name",
                class_name: "gritter-light"
            });
        },
        addWithCallbacks() {
            $.gritter.add({
                title: "This is a notice with callbacks!",
                text: "The callback is...",
                before_open: function () {
                    alert("I am called before it opens");
                },
                after_open: function (e) {
                    alert("I am called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
                },
                before_close: function (e) {
                    var t = e ? "The 'X' was clicked to close me!" : "";
                    alert("I am called before it closes: I am passed the jQuery object for the Gritter element... \n" + t);
                },
                after_close: function (e) {
                    var t = e ? "The 'X' was clicked to close me!" : "";
                    alert("I am called after it closes. " + t);
                }
            });
        },
        addStickyWithCallbacks() {
            $.gritter.add({
                title: "This is a sticky notice with callbacks!",
                text: "Sticky sticky notice.. sticky sticky notice...",
                sticky: true,
                before_open: function () {
                    alert("I am a sticky called before it opens");
                },
                after_open: function (e) {
                    alert("I am a sticky called after it opens: \nI am passed the jQuery object for the created Gritter element...\n" + e);
                },
                before_close: function (e) {
                    alert("I am a sticky called before it closes: I am passed the jQuery object for the Gritter element... \n" + e);
                },
                after_close: function () {
                    alert("I am a sticky called after it closes");
                }
            });
        },
        removeAll() {
            $.gritter.removeAll();
        },
        removeAllWithCallbacks() {
            $.gritter.removeAll({
                before_close: function (e) {
                    alert("I am called before all notifications are closed.  I am passed the jQuery object containing all of Gritter notifications.\n" + e);
                },
                after_close: function () {
                    alert("I am called after everything has been closed.");
                }
            });
        },
        showSweetAlert(type) {
            let options = {
                title: 'Successfully saved!',
                text: 'Your data has been saved successfully.',
                icon: type === 'success' ? 'success' : 'info',
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-default",
                        closeModal: true
                    },
                    confirm: {
                        text: type.charAt(0).toUpperCase() + type.slice(1),
                        value: true,
                        visible: true,
                        className: `btn btn-${type}`,
                        closeModal: true
                    }
                }
            };

            if (type === 'success') {
                options = {
                    title: "Successfully save",
                    text: "",
                    icon: "success"
                };
            } else if (type === 'danger') {
                options.icon = 'error';
            } else if (type === 'warning') {
                options.icon = 'warning';
            }

            swal(options);
        }

        //
    }
}
</script>
