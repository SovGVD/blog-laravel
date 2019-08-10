/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'

Vue.use(VueRouter)
Vue.prototype.$http = axios;	// use it globally in Vue components
var md = require('markdown-it')();
Vue.prototype.$md = md;
Vue.use(require('vue-moment'));

const routes = [
	{
		path: "/post/:id",
		name: "Post",
		props: true,
		component: () => import('./components/post')
	},
	{
		path: "/:page",
		name: "IndexPage",
		props: true,
		component: () => import('./components/index')
	},
	{
		path: "*",
		name: "Index",
		props: true,
		component: () => import('./components/index')
	}
];

const router = new VueRouter({
	mode: 'history',
	routes: routes
});

new Vue({
	router
}).$mount('#app')
