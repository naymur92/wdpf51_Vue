<template>
  <div>
    <form action="">
      <button @click="warn('Form cannot be submitted yet.', $event)">
        Submit
      </button>

      <!-- using inline arrow function -->
      <button @click="(event) => warn('Form cannot be submitted yet.', event)">
        Submit
      </button>
      <button>submit</button>
    </form>
    <!-- using $event special variable -->
  </div>
</template>

<script>
export default {
  methods: {
    warn(message, event) {
      // now we have access to the native event
      if (event) {
        event.preventDefault();
      }
      alert(message);
    },
  },
};
</script>

<style>
</style>