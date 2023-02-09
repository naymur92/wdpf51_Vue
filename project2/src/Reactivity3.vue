<template>
  <div>
    <button @click="mutateDeeply">click here</button>

    <br />
    <br />

    <button>{{ obj.nested.count }}</button>

    <ul>
      <li v-for="(list, index) in obj.arr" :key="index">{{ list }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      obj: {
        nested: { count: 0 },
        arr: ["foo", "bar"],
      },
    };
  },

  // `mounted` is a lifecycle hook which we will explain later
  mounted() {},
  methods: {
    mutateDeeply() {
      // these will work as expected.
      this.obj.nested.count++;
      this.obj.arr.push("baz");
    },
  },
};
</script>