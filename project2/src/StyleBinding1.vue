<template>
  <div>
    <button @click="toggleActive">Click</button>
    <h3 :class="classObject">Text sample</h3>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isActive: true,
      error: null,
    };
  },
  computed: {
    classObject() {
      return {
        active: this.isActive && !this.error,
        "text-danger": this.error && this.error.type === "fatal",
      };
    },
  },
  methods: {
    toggleActive() {
      this.isActive = !this.isActive;
    },
  },
};
</script>
<style>
.active {
  color: green;
  font-weight: 600;
}
.text-danger {
  color: red;
}
</style>