     <template>
    <span>{{currentYear}} </span>
     </template>
     
     <script>
     export default {
       data() {
         return {
           currentYear: new Date().getFullYear(), // 2023
         };
       }
     };
     </script>


