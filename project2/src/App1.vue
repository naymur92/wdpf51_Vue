<template>
  <div>
    <p v-if="score >= 80">Excellent!</p>
    <p v-else-if="score >= 60">Good</p>
    <p v-else-if="score >= 40">Average</p>
    <p v-else>Poor</p>

    <br />

    <h1>List will be displayed if condition is true.</h1>
    <ul v-if="isLikeFruit">
      <li>Apple</li>
      <li>Mango</li>
      <li>Banana</li>
      <li>Lichi</li>
      <li>Guava</li>
    </ul>

    <br />
  </div>
</template>

<script>
export default {
  data() {
    return {
      score: 70,
      isLikeFruit: false,
    };
  },
};
</script>