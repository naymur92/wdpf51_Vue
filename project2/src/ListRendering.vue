<template>
  <div>
    <h1>Fruits List</h1>

    <ol>
      <li v-for="(fruit, index) in fruits" :key='index'>{{fruit}}</li>
    </ol>
  </div>
</template>
<script>
export default {
  data() {
    return {
      fruits: ['mango', 'apple', 'lichi', 'pineapple']
    };
  },
};
</script>