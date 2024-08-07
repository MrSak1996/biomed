<template>
  <div class="mb-3">
    <label class="form-label">{{ label }}</label>
    <input
      :type="type"
      :placeholder="placeholder"
      :required="required"
      class="form-control cust-height"
      :value="value"
      :checked="checked"
      @input="updateValue"
      :readonly="readonly"
      :style="{ width: type === 'checkbox' ? '20px' : '', height: type === 'checkbox' ? '20px' : '' }"
    />
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: [String, Number, Boolean],
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
    readonly: {
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
    },
    checked: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    updateValue(event) {
      const value = this.type === 'checkbox' ? event.target.checked : event.target.value;
      this.$emit('update:modelValue', value);
    }
  }
};
</script>
