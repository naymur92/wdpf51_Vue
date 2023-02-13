<template>
  <div v-pre>
    {{ todo }}
  </div>
  <div>{{ todo }}</div>

  <p>{{ greetingArrow(name) }}</p>
  <p>{{ greeting() }}</p>
</template>

<script>
// import axios from "axios";

export default {
  name: "App",
  data() {
    return {
      todo: [
        {
          name: "Naymur",
          age: 30,
        },
      ],
      name: "Naymur Rahman",
    };
  },
  mounted() {
    // axios.get("https://jsonplaceholder.typicode.com/todos").then((res) => {
    //   this.todo = res.data;
    // });
  },
  methods: {
    greetingArrow: (name) => {
      return "Hello, " + name;
    },
    greeting() {
      return "Hello, " + this.name;
    },
  },
};
</script>
