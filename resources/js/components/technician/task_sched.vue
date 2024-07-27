<template>
<div>
    <Header />
    <Sidebar />
    <div id="content" class="content">
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active">Task Schedule List</li>
        </ol>
        <h1 class="page-header">Task Schedule List</h1>

        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-inverse" data-sortable-id="index-10">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Calendar of Task and Activities</h4>
                    </div>
                    <div class="panel-body" style="height:970px;">
                        <FullCalendar ref="calendarRef" :options="calendarOptions" />
                        <EventModal :eventDetails="eventDetails" :visible="isModalVisible" @close="closeModal" @submit="addEvent" />
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-inverse" data-sortable-id="index-10">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title"><i class="fa fa-info"></i> Information</h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body" style="height: 150px; overflow-y: scroll;">

                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse" data-sortable-id="index-10">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Available Technicians</h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body" style="height: 200px; overflow-y: scroll;">
                            <div id="external-events" class="fc-event-list">
                                <h5 class="m-t-0 m-b-15">On-board Technicians</h5>
                                <div v-for="(job, index) in tech" :key="tech.id">

                                </div>
                                <div class="fc-event" data-color="#00acac">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-success"></i></div> Meeting with
                                    Client
                                </div>

                                <hr class="bg-grey-lighter m-b-15" />
                                <h5 class="m-t-0 m-b-15">Other Events</h5>
                                <div class="fc-event" data-color="#b6c2c9">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i>
                                    </div> Other Event 1
                                </div>
                                <div class="fc-event" data-color="#b6c2c9">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i>
                                    </div> Other Event 2
                                </div>
                                <div class="fc-event" data-color="#b6c2c9">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i>
                                    </div> Other Event 3
                                </div>
                                <div class="fc-event" data-color="#b6c2c9">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i>
                                    </div> Other Event 4
                                </div>
                                <div class="fc-event" data-color="#b6c2c9">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-grey"></i>
                                    </div> Other Event 5
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-inverse" data-sortable-id="index-10">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Activity and Task</h4>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body" style="height: 400px; overflow-y: scroll;">

                            <table class="table table-striped">
                                <tbody>
                                    <tr v-for="n in 50" :key="n" class="odd gradeX">
                                        <td width="1%" class="with-img"></td>
                                        <td>Trident</td>
                                        <td>Trident</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-success btn-icon btn-circle"><i class="fa fa-eye"></i></a>&nbsp;

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios';
import Header from '../../components/layout/header.vue';
import Sidebar from '../../components/layout/sidebar.vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import EventModal from './modal/modal_add_event.vue';

import {
    ref,
    onMounted
} from 'vue';

export default {
    name: 'JobOrder',
    components: {
        Header,
        Sidebar,
        FullCalendar,
        EventModal
    },
    data() {
        return {
          tech:[],
            eventDetails: {
                title: "",
                start: "",
                end: "",
                office: "",
                description: "",
                venue: "",
                enp: "",
                postedBy: "",
                remarks: ""
            },
        }
    },
    methods: {
      
    },
    setup() {
        const calendarRef = ref(null);
        const isModalVisible = ref(false);
        const selectedInfo = ref(null);
        const calendarOptions = ref({
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,today,next',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            droppable: true,
            selectable: true,
            select: (info) => {
                selectedInfo.value = info;
                isModalVisible.value = true;
            },
            editable: true,
            events: [],

        });

        let calendarApi;

        onMounted(() => {
            calendarApi = calendarRef.value.getApi();
            fetch_data();
        });

        function fetch_data() {
            axios.get('/api/fetch_data')
                .then(response => {
                    const events = response.data.map(event => ({
                        ...event,
                        allDay: true
                    }));
                    calendarOptions.value.events = events;
                })
                .catch(error => {
                    console.error('Error Fetching items:', error);
                });
        }

        function addEvent(title) {
            if (title && selectedInfo.value) {
                const newEvent = {
                    title: title,
                    start: selectedInfo.value.startStr,
                    end: selectedInfo.value.endStr
                };
                calendarApi.addEvent(newEvent); // Adding event to the calendar
                closeModal();
            }
        }

        function closeModal() {
            isModalVisible.value = false;
            selectedInfo.value = null;
        }

        return {
            calendarOptions,
            calendarRef,
            isModalVisible,
            closeModal,
            addEvent
        };
    }
};
</script>

<style scoped>

</style>
