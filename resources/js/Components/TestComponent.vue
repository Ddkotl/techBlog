<template>
  <div>
    <div class="m-6">
      <div class="flex justify-center items-center p-6 bg-white rounded-md ">
        <div>
          <div>
            Likes counter {{ likes }}
          </div>
          <div>
            Dislikes counter {{ dislikes }}
          </div>

         <button @click="addLike" class="bg-red-300 p-3 rounded-sm m-2">
          like
         </button>

         <button @click="addDisLike" class="bg-red-300 p-3 rounded-sm m-2">
          dislike
         </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      likes: 0,
      dislikes: 0
    }
  },
  methods:{
    addLike(){
      return this.likes++
    },
    addDisLike(){
      return this.dislikes++
    },
  }
}
</script>