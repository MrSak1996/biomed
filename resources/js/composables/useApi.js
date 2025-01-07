// src/composables/useApi.js
import { ref } from 'vue'
import axios from 'axios';

export function useApi() {
  const division_opts = ref([])
  const work_nature = ref([])
  const equipment_type = ref([])
  const range_category = ref([])
  const employment_opts = ref([])
  const roles_opts = ref([])
  const user_name = ref();
  const departments = ref([])
  const equipments = ref([])



  const get_department = async () => {
    try {
      const res = await axios.get('/api/get_department')
      departments.value = res.data.map((dept) => ({
        id: dept.id,
        value: dept.department,
        name: `${dept.department}`
      }))
      console.log(departments.value)
    } catch (error) {
      console.error('Error fetching divisions:', error)
    }
  };

  const get_equipment = async () => {
    try {
      const res = await axios.get('/api/get_equipment')
      equipments.value = res.data.map((e) => ({
        id: e.id,
        value: e.equipment,
        name: `${e.equipment}`
      }))
    } catch (error) {
      console.error('Error fetching equipment:', error)
    }
  };

  const getControlNo = async (form, userId) => {
    try {
      const res = await axios.get(`/api/getControlNo`)
      const controlNo = res.data.control_no
      const paddedControlNo = String(controlNo).padStart(4, '0')
      form.control_no = paddedControlNo
    } catch (error) {
      console.error(error)
    }
  }

  const province_opts = ref([
    { name: 'Cavite', id: 21 },
    { name: 'Laguna', id: 34 },
    { name: 'Rizal', id: 58 },
    { name: 'Batangas', id: 10 },
    { name: 'Quezon', id: 56 }
  ])

  const status_opts = ref([
    { name: 'Serviceable', id: 1 },
    { name: 'Unserviceable', id: 2 }
  ])

  const section_opts = ref([
    { name: 'RICT', id: 1 },
    { name: 'MES', id: 2 },
    { name: 'PPS', id: 3 }
  ])

  const sex_opts = ref([
    { name: 'Male', value: 'Male' },
    { name: 'Female', value: 'Female' }
  ])

  const capacity_opts = ref([
    { name: '1 TB', value: '1 TB' },
    { name: '2 TB', value: '2 TB' },
    { name: '3 TB', value: '3 TB' },
    { name: '4 TB', value: '4 TB' },
    { name: '5 TB', value: '5 TB' },
    { name: '100 GB', value: '100 GB' },
    { name: '128 GB', value: '128 GB' },
    { name: '250 GB', value: '250 GB' },
    { name: '400 GB', value: '400 GB' },
    { name: '512 GB', value: '512 GB' }
  ])

  const ram_capacity_opts = ref([
    { name: '2 GB', value: '2 GB' },
    { name: '4 GB', value: '4 GB' },
    { name: '8 GB', value: '8 GB' },
    { name: '16 GB', value: '16 GB' },
    { name: '24 GB', value: '24 GB' },
    { name: '32 GB', value: '32 GB' },
    { name: '64 GB', value: '64 GB' }
  ])

  const ram_opts = ref([
    { name: 'Static RAM', id: '1' },
    { name: 'Dynamic RAM', id: '2' },
    { name: 'Synchronous Dynamic RAM (SDRAM)', id: '3' },
    { name: 'Single Data Rate Synchronous Dynamic RAM', id: '4' },
    { name: 'DDR2', id: '5' },
    { name: 'DDR3', id: '6' },
    { name: 'DDR4', id: '7' },
    { name: 'GDDR', id: '8' },
    { name: 'SDRAM', id: '9' },
    { name: 'GDDR2', id: '10' },
    { name: 'GDDR3', id: '11' },
    { name: 'GDDR4', id: '12' },
    { name: 'GDDR5', id: '13' },
    { name: 'Flash Memory', id: '14' }
  ])

  return {
    getControlNo,
    get_department,
    get_equipment,
    equipments,
    departments
  }
}
