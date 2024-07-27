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
              <FullCalendar :options="calendarOptions" />
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
                                <div class="fc-event" data-color="#00acac">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-success"></i></div> Meeting with
                                    Client
                                </div>
                                <div class="fc-event" data-color="#348fe2">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-primary"></i></div> IOS App
                                    Development
                                </div>
                                <div class="fc-event" data-color="#f59c1a">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-warning"></i></div> Group
                                    Discussion
                                </div>
                                <div class="fc-event" data-color="#ff5b57">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-danger"></i>
                                    </div> New System Briefing
                                </div>
                                <div class="fc-event">
                                    <div class="fc-event-icon"><i class="fas fa-circle fa-fw f-s-9 text-inverse"></i></div> Brainstorming
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
                                        <td width="1%" class="f-s-600 text-inverse">{{ n }}</td>
                                        <td width="1%" class="with-img"></td>
                                        <td>Trident</td>
                                        <td>Trident</td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-success btn-icon btn-circle"><i class="fa fa-eye"></i></a>&nbsp;
                                            <a href="javascript:;" class="btn btn-danger btn-icon btn-circle"><i class="fa fa-times"></i></a>&nbsp;

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
import Header from '../../components/layout/header.vue';
import Sidebar from '../../components/layout/sidebar.vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import { ref, onMounted } from 'vue';

export default {
  name: 'JobOrder',
  components: {
    Header,
    Sidebar,
    FullCalendar
  },
  setup() {
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
        const title = prompt('Event Title:');
        if (title) {
          const newEvent = {
            title: title,
            start: info.startStr,
            end: info.endStr
          };
          calendarApi.addEvent(newEvent); // Adding event to the calendar
        }
      },
      editable: true,
      events: [
        {
          title: "All Day Event",
          start: `${getCurrentYear()}-${getCurrentMonth()}-01`,
          color: '#00acac' // Example color
        },
        {
          title: "Long Event",
          start: `${getCurrentYear()}-${getCurrentMonth()}-07`,
          end: `${getCurrentYear()}-${getCurrentMonth()}-10`
        },
        // Add other events here
      ]
    });

    let calendarApi;

    onMounted(() => {
      // Additional setup if necessary
    });

    function getCurrentYear() {
      return new Date().getFullYear();
    }

    function getCurrentMonth() {
      const month = new Date().getMonth() + 1;
      return month < 10 ? `0${month}` : month;
    }

    return {
      calendarOptions,
      calendarApi
    };
  }
}
</script>

<style scoped>


</style>
