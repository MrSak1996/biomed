<template>
  <div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <router-link to="/admin/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo"> <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Biomed</span>
      </router-link>

      <router-link to="/admin/dashboard" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </router-link>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <li v-for="(item, index) in menuItems" :key="index" :class="{ 'active': item.active, 'menu-item': !item.submenu }" class="menu-item">
        <router-link v-if="!item.submenu" :to="item.link" class="menu-link" @click="setActive(index)">
          <i :class="item.icon"></i>
          <div>{{ item.label }}</div>
        </router-link>
        <a v-else class="menu-link menu-toggle">
          <i :class="item.icon"></i>
          <div>{{ item.label }}</div>
        </a>
        <ul v-if="item.submenu" class="menu-sub">
          <li v-for="(subItem, subIndex) in item.submenu" :key="subIndex" class="menu-item">
            <router-link :to="subItem.link" class="menu-link" @click="setActive(index)" >
              <div>{{ subItem.label }}</div>
            </router-link>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  </div>
</template>

<script>
export default {
  name: 'SidebarMenu',
  data() {
    return {
      menuItems: [
        { label: 'Dashboard', icon: 'menu-icon tf-icons bx bx-home-circle', link: '/admin/dashboard', active: false },
        { label: 'Schedule', icon: 'menu-icon tf-icons bx bx-layout', link: '/admin/hospital_list',active:false},
        { label: 'Client List', icon: 'menu-icon tf-icons bx bx-layout', link: '/client/index',active:false, },
        // submenu: [
        //     { label: 'Department', link: '' },
        //     { label: 'OR/ER', link: '' },
        //     { label: 'ICU', link: '' },
        //     { label: 'Fluid', link: '' },
        //     { label: 'Blank', link: '' }
        //   ]
        { label: 'Service Report List', icon: 'menu-icon tf-icons bx bx-task', link: '/admin/hospital_list', active: false },

        { label: 'Equipment', icon: 'menu-icon tf-icons bx bx-task', link: '/admin/hospital_list', active: false },
        { label: 'Technicians', icon: 'menu-icon tf-icons bx bx-task', link: '/admin/hospital_list', active: false },

        // { label: 'Customers', icon: 'menu-icon tf-icons bx bx-dock-top', link: '', active: false },
        { label: 'Account Settings', icon: 'menu-icon tf-icons bx bx-dock-top', link: '', active: false },
        // { label: 'Authentications', icon: 'menu-icon tf-icons bx bx-lock-open-alt', link: 'authentications.html', active: false },
        // { label: 'Misc', icon: 'menu-icon tf-icons bx bx-cube-alt', link: 'misc.html', active: false },
        // Add more menu items as needed
      ]
    };
  },
  methods: {
    setActive(index) {
      this.menuItems.forEach((item, i) => {
        item.active = (i === index);
      });
    }
  }
};
</script>
