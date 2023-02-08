<template>
  <img :src="logoURL" :alt="logoCaption" width="200" height="200" />

  <h1>{{ title }}</h1>
  
  <span>You have {{ allTasks }} {{ allTasks > 1 ? 'tasks' : 'task' }} at the moment</span>
  <div>
    <input type="text" v-model="newTask" @keyup.enter="addTask" placeholder="Add a new task">
    <button @click="addTask" :disabled="newTask.length < 1">Add task</button>
  </div>
  <hr>
  
  <ul>
    <li 
      v-for="(task, index) in latest" 
      :key="task.id"
      @click="finishTask(task)"
      :class="[ 
        task.finished ? 'strikeout' : '',
        task.postponed ? 'text-gray' : '',
        'simple-class'
      ]"
    >
      {{ index + 1 }}. {{ task.name }}

      <div v-if="task.finished">
        <button @click="removeTask(task.id)">Delete task</button>
      </div>
    </li>
  </ul>

</template>

<script>
export default {
  data() {
    return {
      title: 'My To Do App',
      newTask: '',
      logoURL: 'https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1955&q=80',
      logoCaption: 'A photo by Kelly Sikkema on Unsplash showing post-it notes',
      tasks: [
        { id: 1, name: 'Learn Vue JS', finished: true },
        { id: 2, name: 'Build a Vue application', finished: false, edit:true },
        { id: 3, name: 'Write an article about Vue JS', finished: false }
      ]
    }
  },
  methods: {
    addTask() {
      if (this.newTask.length < 1) return

      this.tasks.push({
        id: this.tasks.length + 1,
        name: this.newTask,
        finished: false
      });

      this.newTask = ''
    },
    finishTask(obj) {
      obj.finished = true;
    },
    removeTask(id) {
      this.tasks = this.tasks.filter(item => item.id != id);
    }
  },
  computed: {
    allTasks() {
      return this.tasks.length
    },
    latest() {
      return [...this.tasks].reverse()
    }
  }
}
</script>
<style>
.strikeout {
  text-decoration: line-through;
}
.text-gray{
  color: gray;
}
</style>

