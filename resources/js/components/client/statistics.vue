<style>
.bg-custom {
    background-color: #1565C0;
}

.bg-red {
    background-color: #D50000 !important;
}
</style>
<template>
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL NO. OF EQUIPMENTS</h4>
                    <p>{{ total_equipment }}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>TOTAL NO. OF SERVICEABLE</h4>
                    <p>{{ total_serviceable_count }}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-custom">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>TOTAL NO. OF UNSERVICEABLE</h4>
                    <p>{{ total_unserviceable_count }}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-black-lighter">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>OUTDATED EQUIPMENT</h4>
                    <p>{{ outdated_equipment }}</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue'
const props = defineProps({
    total_equipment: {
        type: Number,
        required: true
    },
    total_serviceable_count: {
        type: Number,
        required: true
    },
    total_unserviceable_count: {
        type: Number,
        required: true
    },
    outdated_equipment: {
        type: Number,
        required: true
    }
});
const total = ref(0);
const serviceableCount = ref(0);
const unserviceableCount = ref(0);

// Watchers to update the reactive variables when props change
watch(() => props.total_equipment, (newValue) => {
    total.value = newValue;
});

</script>
