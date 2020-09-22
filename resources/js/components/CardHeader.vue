 <template>
  <div class="card-header card-header-primary card-header-icon">
    <div class="card-icon" style>
      <i class="material-icons" style>{{ icon }}</i>
    </div>
    <h4 class="card-title">{{ title }}</h4>
    <template v-if="btnActive">
      <div class="card-title col-12 text-right" style="margin-top: -30px">
        <a :href="route" class="btn btn-sm btn-primary">{{ btnTitle }}</a>
      </div>
    </template>
  </div>
</template>
 
 <script>
export default {
  props: {
    icon: { type: String, required: false },
    title: { type: String, required: true },
    btnActive: { type: Boolean, required: true },
    btnTitle: { type: String, required: false },
    route: { type: String, required: false }
  }
};
</script>
 
 <style>
</style>