/*
@license

dhtmlxGantt v.6.1.2 Professional Evaluation
This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) Dinamenta, UAB.

*/
Gantt.plugin(function(t){!function(t,r){if("object"==typeof exports&&"object"==typeof module)module.exports=r();else if("function"==typeof define&&define.amd)define([],r);else{var e=r();for(var n in e)("object"==typeof exports?exports:t)[n]=e[n]}}(window,function(){return function(t){var r={};function e(n){if(r[n])return r[n].exports;var o=r[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,e),o.l=!0,o.exports}return e.m=t,e.c=r,e.d=function(t,r,n){e.o(t,r)||Object.defineProperty(t,r,{enumerable:!0,get:n})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,r){if(1&r&&(t=e(t)),8&r)return t;if(4&r&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(e.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&r&&"string"!=typeof t)for(var o in t)e.d(n,o,function(r){return t[r]}.bind(null,o));return n},e.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(r,"a",r),r},e.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},e.p="/codebase/",e(e.s=230)}({230:function(r,e,n){var o=n(3);function i(){var t=this;this.$data.tasksStore._listenerToDrop&&this.$data.tasksStore.detachEvent(this.$data.tasksStore._listenerToDrop),this.$data.tasksStore.attachEvent("onAfterUpdate",function(){return!t._groups.dynamicGroups||(t._groups.regroup&&t._groups.regroup(),!0)})}t._groups={relation_property:null,relation_id_property:"$group_id",group_id:null,group_text:null,loading:!1,loaded:0,dynamicGroups:!1,init:function(t){var r=this;t.attachEvent("onClear",function(){r.clear()}),r.clear();var e=t.$data.tasksStore.getParent;t.attachEvent("onBeforeTaskMove",function(){return!this._groups.dynamicGroups}),t.$data.tasksStore._listenerToDrop=t.$data.tasksStore.attachEvent("onStoreUpdated",t.bind(i,t)),t.$data.tasksStore.getParent=function(n){return r.is_active()?r.get_parent(t,n):e.apply(this,arguments)};var n=t.$data.tasksStore.setParent;t.$data.tasksStore.setParent=function(e,o){if(!r.is_active())return n.apply(this,arguments);if(t.isTaskExists(o)){var i=t.getTask(o);r.dynamicGroups||(e[r.relation_property]=i[r.relation_id_property]),this._setParentInner.apply(this,arguments)}else r.dynamicGroups&&void 0===e[r.group_id]&&(e[r.relation_property]=[])},t.attachEvent("onBeforeTaskDisplay",function(e,n){return!(r.is_active()&&n.type==t.config.types.project&&!n.$virtual)}),t.attachEvent("onBeforeParse",function(){r.loading=!0}),t.attachEvent("onTaskLoading",function(){return r.is_active()&&(r.loaded--,r.loaded<=0&&(r.loading=!1,t.eachTask(t.bind(function(r){this.get_parent(t,r)},r)))),!0}),t.attachEvent("onParse",function(){r.loading=!1,r.loaded=0})},get_parent:function(t,r,e){void 0===r.id&&(r=t.getTask(r));var n=function(t,r){var e;e=t[r]instanceof Array?o.arrayMap(t[r],function(t,r){return t&&"object"==typeof t?t.resource_id:t}).join(","):t[r];return e}(r,this.relation_property);if(this._groups_pull[n]===r.id)return t.config.root_id;if(void 0!==this._groups_pull[n])return this._groups_pull[n];var i=t.config.root_id;return this.loading||void 0===n||(i=this.find_parent(e||t.getTaskByTime(),n,this.relation_id_property,t.config.root_id,r),this._groups_pull[n]=i),i},find_parent:function(t,r,e,n,o){for(var i=0;i<t.length;i++){var a=t[i];if(void 0!==a[e]&&a[e]==r&&a.id!==o.id)return a.id}return n},clear:function(){this._groups_pull={},this.relation_property=null,this.group_id=null,this.group_text=null},is_active:function(){return!!this.relation_property},generate_sections:function(r,e){for(var n=[],o=0;o<r.length;o++){var i=t.copy(r[o]);i.type=e,i.open=!0,i.$virtual=!0,i.readonly=!0,i[this.relation_id_property]=i[this.group_id],i.text=i[this.group_text],n.push(i)}return n},clear_temp_tasks:function(t){for(var r=0;r<t.length;r++)t[r].$virtual&&(t.splice(r,1),r--)},generate_data:function(t,r){var e=t.getLinks(),n=t.getTaskByTime();this.clear_temp_tasks(n);var o=[];this.is_active()&&r&&r.length&&(o=this.generate_sections(r,t.config.types.project));var i={links:e};return i.data=o.concat(n),i},update_settings:function(t,r,e){this.clear(),this.relation_property=t,this.group_id=r,this.group_text=e},group_tasks:function(t,r,e,n,o){this.update_settings(e,n,o);var i=this.generate_data(t,r);this.loaded=i.data.length,t._clear_data(),t.parse(i)}},t._groups.init(t),t.groupBy=function(r){var e=this,n=t.getTaskByTime();this._groups.dynamicGroups=o.arraySome(n,function(t,e){return t[r.relation_property]instanceof Array}),(r=r||{}).default_group_label=r.default_group_label||this.locale.labels.default_group||"None";var i=r.relation_property||null,a=r.group_id||"key",u=r.group_text||"label";this._groups.regroup=function(){var n=t.getTaskByTime(),s=function(t,r,e){var n;n=t.groups?e._groups.dynamicGroups?function(t,r){var e={},n=[],i={},a=r.relation_property,u=r.delimiter||",",s=!1,c=0;o.forEach(r.groups,function(t){t.default&&(s=!0,c=t.group_id),i[t.key||t[r.group_id]]=t});for(var p=0;p<t.length;p++){var l,f;if(o.isArray(t[p][a]))if(t[p][a].length>0)l=o.arrayMap(t[p][a],function(t,r){return t&&"object"==typeof t?t.resource_id:t}).sort().join(","),f=o.arrayMap(t[p][a],function(t,r){var e;return e=t&&"object"==typeof t?t.resource_id:t,(t=i[e]).label||t.text}).sort().join(u);else{if(s)continue;l=0,f=r.default_group_label}else if(t[p][a])l=t[p][a],f=i[l].label||i[l].text;else{if(s)continue;l=0,f=r.default_group_label}void 0!==l&&void 0===e[l]&&(e[l]={key:l,label:f},l===c&&(e[l].default=!0),e[l][r.group_text]=f,e[l][r.group_id]=l)}return(n=o.hashToArray(e)).forEach(function(t){t.key==c&&(t.default=!0)}),n}(r,t):t.groups:null;return n}(r,n,t);return e._groups.group_tasks(e,s,i,a,u),!0},this._groups.regroup()}},3:function(t,r){var e={second:1,minute:60,hour:3600,day:86400,week:604800,month:2592e3,quarter:7776e3,year:31536e3};function n(t,r){var e=[];if(t.filter)return t.filter(r);for(var n=0;n<t.length;n++)r(t[n],n)&&(e[e.length]=t[n]);return e}t.exports={getSecondsInUnit:function(t){return e[t]||e.hour},forEach:function(t,r){if(t.forEach)t.forEach(r);else for(var e=t.slice(),n=0;n<e.length;n++)r(e[n],n)},arrayMap:function(t,r){if(t.map)return t.map(r);for(var e=t.slice(),n=[],o=0;o<e.length;o++)n.push(r(e[o],o));return n},arrayFind:function(t,r){if(t.find)return t.find(r);for(var e=0;e<t.length;e++)if(r(t[e],e))return t[e]},arrayFilter:n,arrayDifference:function(t,r){return n(t,function(t,e){return!r(t,e)})},arraySome:function(t,r){if(0===t.length)return!1;for(var e=0;e<t.length;e++)if(r(t[e],e,t))return!0;return!1},hashToArray:function(t){var r=[];for(var e in t)t.hasOwnProperty(e)&&r.push(t[e]);return r},sortArrayOfHash:function(t,r,e){var n=function(t,r){return t<r};t.sort(function(t,o){return t[r]===o[r]?0:e?n(t[r],o[r]):n(o[r],t[r])})},throttle:function(t,r){var e=!1;return function(){e||(t.apply(null,arguments),e=!0,setTimeout(function(){e=!1},r))}},isArray:function(t){return Array.isArray?Array.isArray(t):t&&void 0!==t.length&&t.pop&&t.push},isDate:function(t){return!(!t||"object"!=typeof t||!(t.getFullYear&&t.getMonth&&t.getDate))},isStringObject:function(t){return t&&"object"==typeof t&&"function String() { [native code] }"===Function.prototype.toString.call(t.constructor)},isNumberObject:function(t){return t&&"object"==typeof t&&"function Number() { [native code] }"===Function.prototype.toString.call(t.constructor)},isBooleanObject:function(t){return t&&"object"==typeof t&&"function Boolean() { [native code] }"===Function.prototype.toString.call(t.constructor)},delay:function(t,r){var e,n=function(){n.$cancelTimeout(),t.$pending=!0;var o=Array.prototype.slice.call(arguments);e=setTimeout(function(){t.apply(this,o),n.$pending=!1},r)};return n.$pending=!1,n.$cancelTimeout=function(){clearTimeout(e),t.$pending=!1},n.$execute=function(){t(),t.$cancelTimeout()},n},objectKeys:function(t){if(Object.keys)return Object.keys(t);var r,e=[];for(r in t)Object.prototype.hasOwnProperty.call(t,r)&&e.push(r);return e}}}})})});