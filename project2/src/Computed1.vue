<template>
  <div>
    <p>
      Author Name: <span>{{ author.name }}</span>
    </p>
    <p>
      Has published books:
      <!-- <span>{{ publishedBooksMessage }}</span> -->
      <span>{{ calculateBooksMessage() }}</span>
    </p>
    <p>
      Total Books: <span>{{ totalBooks }}</span>
    </p>

    <hr />

    <p>Current timestamp: {{ now }}</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      author: {
        name: "John Doe",
        books: [
          "Vue 2 - Advanced Guide",
          "Vue 3 - Basic Guide",
          "Vue 4 - The Mystery",
        ],
      },
    };
  },
  computed: {
    // a computed getter
    publishedBooksMessage() {
      // `this` points to the component instance
      return this.author.books.length > 0 ? "Yes" : "No";
    },
    totalBooks() {
      return this.author.books.length;
    },
    now() {
      return Date.now();
    },
  },
  methods: {
    calculateBooksMessage() {
      return this.author.books.length > 0 ? "Yes" : "No";
    },
  },
};
</script>