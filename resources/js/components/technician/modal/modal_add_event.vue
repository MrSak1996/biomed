<template>
<div v-if="visible" class="modal-overlay">
    <div class="modal fade show" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Task</h4>
                    <button type="button" class="close" @click="close" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                     <form>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Activity/Task</label>
                                        <input type="text" class="form-control" v-model="eventDetails.title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Activity Description</label>
                                        <textarea rows="3" col="100" style="height:100px !important;" id="description" class="form-control" v-model="eventDetails.description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Start Date</label>
                                        <input type="date" class="form-control" v-model="eventDetails.start">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">End Date</label>
                                        <input type="date" class="form-control" v-model="eventDetails.end">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Assign Technicians</label>
                                        <multiselect v-model="eventDetails.sel_technicians" :options="sel_technicians" label="label" :multiple="false"></multiselect>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Client</label>
                                        <multiselect v-model="eventDetails.sel_client" :options="sel_clients" label="label" :multiple="false"></multiselect>
                                    </div>
                                </div>
    
                            </div>
    
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="confirmButton" class="btn btn-success" style="float: right;" @click="saveData()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<script>
import Multiselect from 'vue-multiselect'

export default {
    components: {
        Multiselect
    },
    props: {
        visible: Boolean,
        eventDetails: Object,

    },
    data() {
        return {
            title: '',
            sel_technicians: [{
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
            ],
            sel_clients: [{
                label: 'Health Serv'
            }]
        };
    },
    methods: {
        close() {
            this.$emit('close');
        },
          saveData() {
                axios.post('/api/post_create_event', {
                    posted_by:1,
                    client: this.eventDetails.client,
                    technician: this.eventDetails.technician,
                    title: this.eventDetails.title,
                    start: this.eventDetails.start,
                    end: this.eventDetails.end,
                    description: this.eventDetails.description,
                }).then(() => {
                    setTimeout(() => {
                    this.showSweetAlert('success');
                    location.reload();
                }, 1000); 
    
                }).catch((error) => {
    
                })
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
        
    }
};
</script>

<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    /* Ensure the modal overlay is above other content */
}

.modal-dialog {
    z-index: 1060;
    /* Ensure the modal content is above the overlay */
}
</style>
