<template>
    <div v-if="visible" class="modal-overlay">
        <div class="modal fade show" style="display: block">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Recommendation Details</h4>
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
                                    <label for="warranty" class="form-label"
                                        >Warranty</label
                                    >
                                    <input
                                        v-model="warranty"
                                        type="text"
                                        class="form-control"
                                        id="warranty"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="workStarted" class="form-label"
                                        >Work Started (Date/Time)</label
                                    >
                                    <input
                                        v-model="workStarted"
                                        type="date"
                                        class="form-control"
                                        id="workStarted"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label
                                        for="workCompleted"
                                        class="form-label"
                                        >Work Completed (Date/Time)</label
                                    >
                                    <input
                                        v-model="workCompleted"
                                        type="date"
                                        class="form-control"
                                        id="workCompleted"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="date" class="form-label"
                                        >Date</label
                                    >
                                    <input
                                        v-model="date"
                                        type="date"
                                        class="form-control"
                                        id="date"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="remarks" class="form-label"
                                        >Remarks</label
                                    >
                                    <input
                                        v-model="remarks"
                                        type="text"
                                        class="form-control"
                                        id="remarks"
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
                            @click="update"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, computed } from "vue";
import axios from "axios";

// Props
const props = defineProps({
    selectedClientId: {
        type: Number,
        required: true,
    },
    visible: Boolean,
});

// Reactive state
const warranty = ref("");
const workStarted = ref("");
const workCompleted = ref("");
const date = ref("");
const remarks = ref("");
const emit = defineEmits(["close"]);

// Computed properties for form handling (if needed)
const formData = computed(() => ({
    id: props.selectedClientId,
    warranty: warranty.value,
    workStarted: workStarted.value,
    workCompleted: workCompleted.value,
    date: date.value,
    remarks: remarks.value,
}));

// Update function
const update = async () => {
    try {
        await axios.postForm(
            `./api/post_update_service_details`,
            formData.value
        );
        setTimeout(() => {
            showSweetAlert("success");
            location.reload();
        }, 1000);
        // Handle successful update (e.g., show a message or close the modal)
    } catch (error) {
        console.error("Error updating client details:", error);
        // Handle error (e.g., show an error message)
    }
};
const close = () => {
    emit("close");
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
            title: "Successfully save",
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
