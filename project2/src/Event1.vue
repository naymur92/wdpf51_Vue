<template>
  <div>
    <h1>Event 1</h1>
    <input
      type="text"
      v-model="formname"
      @keyup.enter="setName(formname)"
      placeholder="Enter Name"
    />
    <p><strong>Name:</strong> {{ name }}</p>
    <button @click="setName(formname)">Change Name</button>
    <hr />

    <h2>Count: {{ count }}</h2>
    <button @click="count++">Count + 1</button>
    <button @click="count--">Count - 1</button>
    <button @click="count += 5">Count + 5</button>
    <button @click="count -= 5">Count - 5</button>
    <hr />

    <!-- using $event special variable -->
    <button @click="warn('Form cannot be submitted yet.', $event)">
      Submit
    </button>

    <!-- using inline arrow function -->
    <button @click="(event) => warn('Form cannot be submitted yet.', event)">
      Submit
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Naymur",
      formname: "",
      count: 0,
    };
  },
  methods: {
    setName(param) {
      this.name = param;
      this.formname = "";
    },
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