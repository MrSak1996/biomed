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
  const designation = ref();

  const fetchCurUser = async () => {
    // Retrieve the API token from localStorage
    const api_token = localStorage.getItem('api_token');
    
    // Check if the token exists
    if (!api_token) {
      console.error('API token not found. Please log in.');
      return;
    }
  
    try {
      // Make the API call to fetch the current user
      const response = await api.get(`/getUsers?api_token=${api_token}`, {
        headers: {
          Authorization: `Bearer ${api_token}`,
          'Content-Type': 'application/json',
        },
      });
  
      // Check if the response status is valid
      if (response.status === 200 && response.data) {
        designation.value = response.data.data[0].roles;
        return response.data;
      } else {
        console.error('Failed to fetch current user: Invalid response');
      }
    } catch (error) {
      // Handle any errors
      console.error('Error fetching current user:', error.response?.data?.message || error.message);
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
  const generateQRCode = async (form,tab_form,item_id,userId) => {
    try {
      const res = await api.get('/generateQRCode?id='+userId+"&item_id="+item_id+"&tab_form="+tab_form)
      const controlNo = res.data.control_no
      const paddedControlNo = String(controlNo).padStart(4, '0')
      form.qr_code = paddedControlNo
    } catch (error) {
      console.error(error)
    }
  }

  const getDivision = async () => {
    try {
      const res = await api.get('/getDivision')
      division_opts.value = res.data.map((division) => ({
        id: division.id,
        value: division.id,
        name: `${division.acronym} - ${division.division_title}`
      }))
    } catch (error) {
      console.error('Error fetching divisions:', error)
    }
  }

  const getNatureWork = async () => {
    try {
      const res = await api.get('/getNatureWork')
      work_nature.value = res.data.map((work) => ({
        id: work.id,
        name: work.nature_work_title
      }))
    } catch (error) {
      console.error('Error fetching work nature:', error)
    }
  }

  const getEquipment = async () => {
    try {
      const res = await api.get('/getEquipment')
      equipment_type.value = res.data.map((item) => ({
        id: item.id,
        name: item.equipment_title
      }))
    } catch (error) {
      console.error('Error fetching equipment types:', error)
    }
  }

  const getRangeCategory = async () => {
    try {
      const res = await api.get('/getRangeCategory')
      range_category.value = res.data.map((item) => ({
        id: item.id,
        name: item.range_title
      }))
    } catch (error) {
      console.error('Error fetching range categories:', error)
    }
  }

  const getEmploymentType = async () => {
    try {
      const res = await api.get('/getEmploymentType')
      employment_opts.value = res.data.map((item) => ({
        id: item.id,
        name: item.employment_title
      }))
    } catch (error) {
      console.error('Error fetching employment types:', error)
    }
  }

  const getUserRoles = async () => {
    try {
      const res = await api.get('/getUserRoles')
      roles_opts.value = res.data.map((item) => ({
        id: item.id,
        name: item.roles
      }))
    } catch (error) {
      console.error('Error fetching user role:', error)
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
    getControlNo
  }
}
