/*
@license

dhtmlxGantt v.6.1.2 Professional Evaluation
This software is covered by DHTMLX Evaluation License. Contact sales@dhtmlx.com to get Commercial or Enterprise license. Usage without proper license is prohibited.

(c) Dinamenta, UAB.

*/
Gantt.plugin(function(e){!function(e,t){if("object"==typeof exports&&"object"==typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{var n=t();for(var o in n)("object"==typeof exports?exports:e)[o]=n[o]}}(window,function(){return function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/codebase/",n(n.s=194)}({194:function(t,n){e.locale={date:{month_full:["Január","Február","Március","Április","Május","Június","Július","Augusztus","Szeptember","Október","November","December"],month_short:["Jan","Feb","Már","Ápr","Máj","Jún","Júl","Aug","Sep","Okt","Nov","Dec"],day_full:["Vasárnap","Hétfõ","Kedd","Szerda","Csütörtök","Péntek","szombat"],day_short:["Va","Hé","Ke","Sze","Csü","Pé","Szo"]},labels:{new_task:"Új feladat",dhx_cal_today_button:"Ma",day_tab:"Nap",week_tab:"Hét",month_tab:"Hónap",new_event:"Új esemény",icon_save:"Mentés",icon_cancel:"Mégse",icon_details:"Részletek",icon_edit:"Szerkesztés",icon_delete:"Törlés",confirm_closing:"",confirm_deleting:"Az esemény törölve lesz, biztosan folytatja?",section_description:"Leírás",section_time:"Idõszak",section_type:"Type",column_wbs:"WBS",column_text:"Task name",column_start_date:"Start time",column_duration:"Duration",column_add:"",link:"Link",confirm_link_deleting:"will be deleted",link_start:" (start)",link_end:" (end)",type_task:"Task",type_project:"Project",type_milestone:"Milestone",minutes:"Minutes",hours:"Hours",days:"Days",weeks:"Week",months:"Months",years:"Years",message_ok:"OK",message_cancel:"Mégse",section_constraint:"Constraint",constraint_type:"Constraint type",constraint_date:"Constraint date",asap:"As Soon As Possible",alap:"As Late As Possible",snet:"Start No Earlier Than",snlt:"Start No Later Than",fnet:"Finish No Earlier Than",fnlt:"Finish No Later Than",mso:"Must Start On",mfo:"Must Finish On",resources_filter_placeholder:"type to filter",resources_filter_label:"hide empty"}}}})})});