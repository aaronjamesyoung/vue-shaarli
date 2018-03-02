<template>
  <div class="linkList">
    <!-- search box -->
    <div class="linkSearch">
      <input type="text" v-model="searchTerm" placeholder="Search Links" />
    </div>

    <!-- Sort it -->
    <div class="linkSort">
      Sort:
      <a v-on:click="currentSort = 'title'" v-bind:class="{'inactive': currentSort === 'title'}">A-Z</a>
      <a v-on:click="currentSort = 'created'" v-bind:class="{'inactive': currentSort === 'created'}">Newest</a>
    </div>

    <!-- Link list -->
    <div class="linkList__links">
      <div v-for="link in sortLinks()" v-bind:key="link.id" class="linkList__link">
        <div class="linkList__favicon" v-bind:style="`background-image: url('//favicon.yandex.net/favicon/${link.url}');`"></div>
        <div class="linkList__text">
          <a v-bind:href="link.url" target="_blank">{{decodeHtml(link.title)}}</a>
          <div class="linkList__tags" v-if="link.tags.length > 0">
            <span v-for="tag in link.tags" v-bind:key="tag">{{tag}}</span>
            <div style="clear: both;"></div>
          </div>
          <div class="linkList__edit">
            <a target="_blank" v-bind:href="config.shaarliUrl+'?edit_link='+link.id">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  // *** Name *** //
  name: "LinkList",

  // *** Data *** //
  props: ["config"],

  data() {
    return {
      searchTerm: "",
      linkList: [],
      currentSort: this.config.defaultSort
    };
  },

  methods: {
    getLinks() {
      axios.get(this.config.shaarliScriptUrl).then(response => {
        this.linkList = response.data;
      });
    },
    sortLinks(element = this.currentSort) {
      // Expects default sort element to be a string (sorts case insensitive)
      const newLinks = this.filteredLinks.sort((a, b) => {
        let ret = 0;
        if (a[element].toLowerCase() > b[element].toLowerCase()) {
          ret = 1;
        } else if (b[element].toLowerCase() > a[element].toLowerCase()) {
          ret = -1;
        }

        // Cases: if sort element === 'created' we want to get the newest ones first:
        if (element === "created") {
          ret *= -1;
        }
        return ret;
      });
      return newLinks;
    },
    decodeHtml(html) {
      const txt = document.createElement("textarea");
      txt.innerHTML = html;
      return txt.value;
    }
  },

  computed: {
    filteredLinks() {
      let newLinks = [];
      if (this.searchTerm !== "") {
        newLinks = this.linkList.filter(link => {
          let ret = false;
          if (
            JSON.stringify(link)
              .toLowerCase()
              .indexOf(this.searchTerm.toLowerCase()) !== -1
          ) {
            ret = true;
          }
          return ret;
        });
      } else {
        newLinks = JSON.parse(JSON.stringify(this.linkList));
      }
      return newLinks;
    }
  },

  // *** Lifecycle *** //
  created() {
    this.getLinks();
  }
};
</script>

<style scoped lang="css">
  .linkList { width: 95vw; margin: 2.5vw auto 0 auto; }

  .linkSearch input { margin-bottom: calc(2vw * (95 / 100)); width: 100%; padding: 1rem 2rem;
    background: var(--color-night-1); border: 0;
    color: inherit; font-size: 1rem; }

  .linkSort { margin-bottom: calc(2vw * (95 / 100));
    font-size: 0.875rem; text-transform: uppercase;
  }
  .linkSort a { display: inline-block; margin-left: 8px;
    color: var(--color-cool-grayblue);
    cursor: pointer; }
  .linkSort a.inactive { color: inherit; pointer-events: none; }

  .linkList__links { display: flex; flex-wrap: wrap; justify-content: space-between; }
  .linkList__link { width: 32%; 
      position: relative; padding: 1rem; margin-bottom: calc(2vw * (95 / 100));
      border: 1px solid var(--color-night-4); background: var(--color-night-3);
      border-radius: 3px;}
  .linkList__favicon { height: 16px; width: 16px; float: left; margin-top: 5px; margin-right: 16px; background-position: 0 -32px; }
  .linkList__text { overflow: hidden; }
  .linkList__tags { margin-top: 1rem; }
  .linkList__tags span { display: block; float: left; margin-right: 1rem; margin-bottom: 0.5rem; padding: 0 10px;
    background: var(--color-night-1);
    line-height: 2rem; font-size: 0.75rem; text-transform: uppercase; font-weight: bold;
    border-radius: 100px;
  }
  .linkList__edit { position: absolute; bottom: 0.5rem; right: 0.5rem;
    font-size: 0.75rem; text-transform: uppercase; font-style: italic;
  }
  .linkList__edit a { color: var(--color-cool-blue); }
</style>
