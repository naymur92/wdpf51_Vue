<template>
  <div>
    <h1>Hello World</h1>
    <p>My name is, {{ name }}</p>
    <p>Age: {{ age }}</p>
    <p>Address: {{ address }}</p>

    <br />

    <p>Using text interpolation: {{ rawHtml }}</p>
    <p>Using v-html directive: <span v-html="rawHtml"></span></p>

    <br />

    <div :id="'dynamicId'">Dynamic ID</div>
    <div :class="{ dynamicClass: isAcitve }">Dynamic Class</div>

    <br />

    <button :disabled="isButtonDisabled">Button</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Naymur Rahman",
      age: 30,
      address: "Mirpur",
      rawHtml: "<h3>Hello</h3>",
      isAcitve: false,
      isButtonDisabled: true,
    };
  },
};
</script>

<style>
#dynamicId {
  color: aqua;
}
.dynamicClass {
  color: yellow;
}
.active {
  color: green;
}
</style>