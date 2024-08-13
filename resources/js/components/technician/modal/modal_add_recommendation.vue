<template>
    <div v-if="visible" class="modal-overlay">
        <div class="modal fade show" style="display: block">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Recommendation Details</h4>
                        <button
                            type="button"
                            class="close"
                            @click="close"
                            aria-hidden="true"
                        >
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label
                                        for="warranty"
                                        class="form-label"
                                        >Warranty</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                        aria-describedby="warranty"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label
                                        for="warranty"
                                        class="form-label"
                                        >Work Started (Date/Time)</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                        aria-describedby="warranty"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label
                                        for="warranty"
                                        class="form-label"
                                        >Work Completed (Date/Time)</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                        aria-describedby="warranty"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label
                                        for="warranty"
                                        class="form-label"
                                        >Date</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                        aria-describedby="warranty"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label
                                        for="warranty"
                                        class="form-label"
                                        >Remarks</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                        aria-describedby="warranty"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="submit"
                            id="confirmButton"
                            class="btn btn-success"
                            style="float: right"
                            @click="saveData"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import Multiselect from "vue-multiselect";
import axios from "axios";

export default {
    components: {
        Multiselect,
    },
    props: {
        visible: {
            type: Boolean,
            required: true,
        },
    },
    setup(props, { emit }) {
        const title = ref("");
        const sel_technicians = ref([
            { label: "DESKTOP/LAPTOP REPAIR", value: 1 },
            { label: "HARDWARE INSTALLATION", value: 2 },
            { label: "PRINTER/SCANNER/COPIER", value: 3 },
        ]);
        const sel_clients = ref([{ label: "Health Serv" }]);

        const close = () => {
            emit("close");
        };

        const saveData = () => {
            axios
                .post("/api/post_create_event", {
                    posted_by: 1,
                    client: props.eventDetails.client,
                    technician: props.eventDetails.technician,
                    title: props.eventDetails.title,
                    start: props.eventDetails.start,
                    end: props.eventDetails.end,
                    description: props.eventDetails.description,
                })
                .then(() => {
                    setTimeout(() => {
                        showSweetAlert("success");
                        location.reload();
                    }, 1000);
                })
                .catch((error) => {
                    console.error("An error occurred:", error);
                });
        };

        const showSweetAlert = (type) => {
            let options = {
                title: "Successfully saved!",
                text: "Your data has been saved successfully.",
                icon: type === "success" ? "success" : "info",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-default",
                        closeModal: true,
                    },
                    confirm: {
                        text: type.charAt(0).toUpperCase() + type.slice(1),
                        value: true,
                        visible: true,
                        className: `btn btn-${type}`,
                        closeModal: true,
                    },
                },
            };

            if (type === "success") {
                options = {
                    title: "Successfully saved",
                    text: "",
                    icon: "success",
                };
            } else if (type === "danger") {
                options.icon = "error";
            } else if (type === "warning") {
                options.icon = "warning";
            }

            swal(options);
        };

        return {
            title,
            sel_technicians,
            sel_clients,
            close,
            saveData,
            showSweetAlert,
        };
    },
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
}

.modal-dialog {
    z-index: 1060;
}
</style>
