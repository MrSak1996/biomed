<style>
.cust-height{
    height: 40px;
}
</style>
<template>
  <div class="mb-3">
    <label class="form-label">{{ label }}</label>
    <input
      
      :type="type"
      :placeholder="placeholder"
      :required="required"
      class="form-control cust-height"
      v-model="inputValue"
      :value="value"
      @input="updateValue"
    />
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: [String, Number],
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    },
    required: {
      type: Boolean,
      default: false
    },
    type: {
      type: String,
      default: 'text'
    },
    label: {
      type: String,
      default: ''
    }
  },
  computed: {
    inputValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  },
  methods: {
    updateValue(event) {
      this.inputValue = event.target.value;
    }
  }
};
</script>

<style scoped>
.form-control {
  width: 100%;
}
</style>
