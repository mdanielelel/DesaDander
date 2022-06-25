(window["aioseopjsonp"]=window["aioseopjsonp"]||[]).push([["settings-Main-vue","settings-AccessControl-vue","settings-Advanced-vue","settings-GeneralSettings-vue","settings-RssContent-vue","settings-lite-AccessControl-vue","settings-pro-AccessControl-vue"],{"1b7a":function(t,s,e){},"20b1":function(t,s,e){},3562:function(t,s,e){},"4d07":function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-access-control"},[e("core-card",{attrs:{slug:"accessControl"},scopedSlots:t._u([{key:"header",fn:function(){return[t._v(" "+t._s(t.strings.accessControl)+" "),e("core-pro-badge")]},proxy:!0},{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])},[t._l(t.getRoles,(function(s){return[t.canShowRole(s)?e("core-settings-row",{key:s.name,attrs:{name:s.label},scopedSlots:t._u([{key:"content",fn:function(){return[e("core-access-control-options",{attrs:{roleSettings:t.getSettings(s)},scopedSlots:t._u([{key:"description",fn:function(){return[e("p",{staticClass:"aioseo-description",domProps:{innerHTML:t._s(s.description)}})]},proxy:!0}],null,!0),model:{value:t.getSettings(s).useDefault,callback:function(e){t.$set(t.getSettings(s),"useDefault",e)},expression:"getSettings(role).useDefault"}})]},proxy:!0}],null,!0)}):t._e()]}))],2)],1)},i=[],o=e("5530"),a=(e("b0c0"),e("caad"),e("ac1f"),e("5319"),e("9155")),r=e("2f62"),l={mixins:[a["a"]],computed:Object(o["a"])({},Object(r["e"])(["options"])),methods:{canShowRole:function(t){var s=t.name;return"administrator"!==s?(["seoManager","seoEditor"].includes(s)&&(s=s.replace("seo","aioseo_").toLowerCase()),s in this.$aioseo.user.roles):this.$aioseo.data.multisite},getSettings:function(t){return t.dynamic?this.options.accessControl.dynamic[t.name]:this.options.accessControl[t.name]}}},c=l,d=(e("7214"),e("2877")),u=Object(d["a"])(c,n,i,!1,null,null,null);s["default"]=u.exports},"5acb":function(t,s,e){},"5eb7":function(t,s,e){"use strict";e("9313")},"5ee0":function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-advanced"},[e("core-card",{attrs:{slug:"advanced","header-text":t.strings.advanced}},[e("core-settings-row",{attrs:{name:t.strings.truSeo},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-toggle",{model:{value:t.options.advanced.truSeo,callback:function(s){t.$set(t.options.advanced,"truSeo",s)},expression:"options.advanced.truSeo"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.truSeoDescription)+" ")])]},proxy:!0}])}),e("core-settings-row",{attrs:{name:t.strings.headlineAnalyzer},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-toggle",{model:{value:t.options.advanced.headlineAnalyzer,callback:function(s){t.$set(t.options.advanced,"headlineAnalyzer",s)},expression:"options.advanced.headlineAnalyzer"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.headlineAnalyzerDescription)+" ")])]},proxy:!0}])}),e("core-settings-row",{attrs:{name:t.strings.postTypeColumns},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-checkbox",{attrs:{size:"medium"},model:{value:t.options.advanced.postTypes.all,callback:function(s){t.$set(t.options.advanced.postTypes,"all",s)},expression:"options.advanced.postTypes.all"}},[t._v(" "+t._s(t.strings.includeAllPostTypes)+" ")]),t.options.advanced.postTypes.all?t._e():e("core-post-type-options",{attrs:{options:t.options.advanced,type:"postTypes"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.selectPostTypes)+" "),e("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"selectPostTypesColumns",!0))}})])]},proxy:!0}])}),e("core-settings-row",{scopedSlots:t._u([{key:"name",fn:function(){return[t._v(" "+t._s(t.strings.taxonomyColumns)+" "),t.isUnlicensed?e("core-pro-badge"):t._e()]},proxy:!0},{key:"content",fn:function(){return[t.isUnlicensed?e("base-checkbox",{attrs:{disabled:"",size:"medium",value:!0}},[t._v(" "+t._s(t.strings.includeAllTaxonomies)+" ")]):t._e(),t.isUnlicensed?t._e():e("base-checkbox",{attrs:{size:"medium"},model:{value:t.options.advanced.taxonomies.all,callback:function(s){t.$set(t.options.advanced.taxonomies,"all",s)},expression:"options.advanced.taxonomies.all"}},[t._v(" "+t._s(t.strings.includeAllTaxonomies)+" ")]),t.options.advanced.taxonomies.all||t.isUnlicensed?t._e():e("core-post-type-options",{attrs:{options:t.options.advanced,type:"taxonomies"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.selectTaxonomies)+" "),e("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"selectTaxonomiesColumns",!0))}})]),t.isUnlicensed?e("core-alert",{staticClass:"inline-upsell",attrs:{type:"blue"}},[e("div",{domProps:{innerHTML:t._s(t.strings.taxonomyColumnsUpsell)}})]):t._e()]},proxy:!0}])}),e("core-settings-row",{attrs:{align:""},scopedSlots:t._u([{key:"name",fn:function(){return[t._v(" "+t._s(t.strings.adminBarMenu)+" "),t.isUnlicensed?e("core-pro-badge"):t._e()]},proxy:!0},{key:"content",fn:function(){return[e("base-radio-toggle",{attrs:{disabled:t.isUnlicensed,name:"adminBarMenu",options:[{label:t.$constants.GLOBAL_STRINGS.hide,value:!1,activeClass:"dark"},{label:t.$constants.GLOBAL_STRINGS.show,value:!0}]},model:{value:t.adminBarMenu,callback:function(s){t.adminBarMenu=s},expression:"adminBarMenu"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.adminBarMenuDescription)+" ")]),t.isUnlicensed?e("core-alert",{staticClass:"inline-upsell",attrs:{type:"blue"}},[e("div",{domProps:{innerHTML:t._s(t.strings.adminBarMenuUpsell)}})]):t._e()]},proxy:!0}])}),e("core-settings-row",{attrs:{align:""},scopedSlots:t._u([{key:"name",fn:function(){return[t._v(" "+t._s(t.strings.dashboardWidget)+" "),t.isUnlicensed?e("core-pro-badge"):t._e()]},proxy:!0},{key:"content",fn:function(){return[e("base-radio-toggle",{attrs:{disabled:t.isUnlicensed,name:"dashboardWidget",options:[{label:t.$constants.GLOBAL_STRINGS.hide,value:!1,activeClass:"dark"},{label:t.$constants.GLOBAL_STRINGS.show,value:!0}]},model:{value:t.dashboardWidget,callback:function(s){t.dashboardWidget=s},expression:"dashboardWidget"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.dashboardWidgetDescription)+" ")]),t.isUnlicensed?e("core-alert",{staticClass:"inline-upsell",attrs:{type:"blue"}},[e("div",{domProps:{innerHTML:t._s(t.strings.dashboardWidgetUpsell)}})]):t._e()]},proxy:!0}])}),e("core-settings-row",{attrs:{name:t.strings.announcements,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-radio-toggle",{attrs:{name:"announcements",options:[{label:t.$constants.GLOBAL_STRINGS.hide,value:!1,activeClass:"dark"},{label:t.$constants.GLOBAL_STRINGS.show,value:!0}]},model:{value:t.options.advanced.announcements,callback:function(s){t.$set(t.options.advanced,"announcements",s)},expression:"options.advanced.announcements"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.announcementsDescription)+" ")])]},proxy:!0}])}),t.$isPro?e("core-settings-row",{attrs:{align:""},scopedSlots:t._u([{key:"name",fn:function(){return[t._v(" "+t._s(t.strings.automaticUpdates)+" ")]},proxy:!0},{key:"content",fn:function(){return[e("base-radio-toggle",{attrs:{name:"autoUpdates",options:[{label:t.strings.all,value:"all"},{label:t.strings.minor,value:"minor"},{label:t.strings.none,value:"none",activeClass:"dark"}]},model:{value:t.options.advanced.autoUpdates,callback:function(s){t.$set(t.options.advanced,"autoUpdates",s)},expression:"options.advanced.autoUpdates"}}),e("div",{staticClass:"aioseo-description"},["all"===t.options.advanced.autoUpdates?e("span",[t._v(t._s(t.strings.allDescription))]):t._e(),"minor"===t.options.advanced.autoUpdates?e("span",[t._v(t._s(t.strings.minorDescription))]):t._e(),"none"===t.options.advanced.autoUpdates?e("span",[t._v(t._s(t.strings.noneDescription))]):t._e()])]},proxy:!0}],null,!1,89936591)}):t._e(),t.$isPro?t._e():e("core-settings-row",{scopedSlots:t._u([{key:"name",fn:function(){return[t._v(" "+t._s(t.strings.usageTracking)+" "),e("core-tooltip",{scopedSlots:t._u([{key:"tooltip",fn:function(){return[e("div",{domProps:{innerHTML:t._s(t.strings.usageTrackingTooltip)}})]},proxy:!0}],null,!1,1886299547)},[e("svg-circle-question-mark")],1)]},proxy:!0},{key:"content",fn:function(){return[e("base-toggle",{model:{value:t.options.advanced.usageTracking,callback:function(s){t.$set(t.options.advanced,"usageTracking",s)},expression:"options.advanced.usageTracking"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.usageTrackingDescription)+" ")])]},proxy:!0}],null,!1,309685458)}),e("core-settings-row",{attrs:{name:t.strings.uninstallAioseo},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-toggle",{model:{value:t.options.advanced.uninstall,callback:function(s){t.$set(t.options.advanced,"uninstall",s)},expression:"options.advanced.uninstall"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.uninstallAioseoDescription)+" ")])]},proxy:!0}])})],1)],1)},i=[],o=e("5530"),a=e("2f62"),r={data:function(){return{strings:{advanced:this.$t.__("Advanced Settings",this.$td),truSeo:this.$t.__("TruSEO Score & Content",this.$td),truSeoDescription:this.$t.__("Enable our TruSEO score to help you optimize your content for maximum traffic.",this.$td),headlineAnalyzer:this.$t.__("Headline Analyzer",this.$td),headlineAnalyzerDescription:this.$t.__("Enable our Headline Analyzer to help you write irrestible headlines and rank better in search results.",this.$td),seoAnalysis:this.$t.__("SEO Analysis",this.$td),postTypeColumns:this.$t.__("Post Type Columns",this.$td),includeAllPostTypes:this.$t.__("Include All Post Types",this.$td),selectPostTypes:this.$t.sprintf(this.$t.__("Select which Post Types you want to use the %1$s columns with.",this.$td),"AIOSEO"),usageTracking:this.$t.__("Usage Tracking",this.$td),adminBarMenu:this.$t.__("Admin Bar Menu",this.$td),adminBarMenuDescription:this.$t.sprintf(this.$t.__("This adds %1$s to the admin toolbar for easy access to your SEO settings.",this.$td),"AIOSEO"),dashboardWidget:this.$t.__("Dashboard Widget",this.$td),dashboardWidgetDescription:this.$t.__("This displays an SEO News widget on the dashboard.",this.$td),announcements:this.$t.__("Announcements",this.$td),announcementsDescription:this.$t.__("This allows you to hide plugin announcements and update details.",this.$td),automaticUpdates:this.$t.__("Automatic Updates",this.$td),all:this.$t.__("All (recommended)",this.$td),allDescription:this.$t.__("You are getting the latest features, bugfixes, and security updates as they are released.",this.$td),minor:this.$t.__("Minor Only",this.$td),minorDescription:this.$t.__("You are getting bugfixes and security updates, but not major features.",this.$td),none:this.$t.__("None",this.$td),noneDescription:this.$t.__("You will need to manually update everything.",this.$td),usageTrackingDescription:this.$t.__("By allowing us to track usage data we can better help you because we know with which WordPress configurations, themes and plugins we should test.",this.$td),usageTrackingTooltip:this.$t.sprintf(this.$t.__("Complete documentation on usage tracking is available %1$shere%2$s.",this.$td),this.$t.sprintf('<strong><a href="%1$s" target="_blank">',this.$links.getDocUrl("usageTracking")),"</a></strong>"),adminBarMenuUpsell:this.$t.sprintf(this.$t.__("This Admin Bar feature is only available for licensed %1$s users. %2$s",this.$td),"<strong>".concat("AIOSEO"," Pro</strong>"),this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"admin-bar-menu",!0)),dashboardWidgetUpsell:this.$t.sprintf(this.$t.__("The Dashboard Widget feature is only available for licensed %1$s users. %2$s",this.$td),"<strong>".concat("AIOSEO"," Pro</strong>"),this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"dashboard-widget",!0)),taxonomyColumns:this.$t.__("Taxonomy Columns",this.$td),includeAllTaxonomies:this.$t.__("Include All Taxonomies",this.$td),selectTaxonomies:this.$t.sprintf(this.$t.__("Select which Taxonomies you want to use the %1$s columns with.",this.$td),"AIOSEO"),taxonomyColumnsUpsell:this.$t.sprintf(this.$t.__("This feature is only for licensed %1$s users. %2$s",this.$td),"<strong>".concat("AIOSEO"," Pro</strong>"),this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"taxonomy-columns",!0)),uninstallAioseo:this.$t.sprintf(this.$t.__("Uninstall %1$s",this.$td),"AIOSEO"),uninstallAioseoDescription:this.$t.sprintf(this.$t.__("Check this if you would like to remove ALL %1$s data upon plugin deletion. All settings and SEO data will be unrecoverable.",this.$td),"AIOSEO")}}},computed:Object(o["a"])(Object(o["a"])(Object(o["a"])({},Object(a["c"])(["settings","isUnlicensed"])),Object(a["e"])(["options"])),{},{adminBarMenu:{get:function(){return!!this.isUnlicensed||this.options.advanced.adminBarMenu},set:function(t){this.options.advanced.adminBarMenu=t}},dashboardWidget:{get:function(){return!!this.isUnlicensed||this.options.advanced.dashboardWidget},set:function(t){this.options.advanced.dashboardWidget=t}}})},l=r,c=(e("5eb7"),e("2877")),d=Object(c["a"])(l,n,i,!1,null,null,null);s["default"]=d.exports},"61c3":function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-access-control-lite"},[e("core-card",{attrs:{slug:"accessControl"},scopedSlots:t._u([{key:"header",fn:function(){return[t._v(" "+t._s(t.strings.accessControl)+" "),e("core-pro-badge")]},proxy:!0},{key:"tooltip",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])},[e("core-blur",[t._l(t.getRoles,(function(s){return[e("core-settings-row",{key:s.name,attrs:{name:s.label},scopedSlots:t._u([{key:"content",fn:function(){return[e("div",{staticClass:"toggle"},[e("base-toggle",{attrs:{disabled:!0,value:!0}},[t._v(" "+t._s(t.strings.useDefaultSettings)+" ")])],1)]},proxy:!0}],null,!0)})]}))],2),e("cta",{attrs:{"feature-list":[t.strings.granularControl,t.strings.wpRoles,t.strings.seoManagerRole,t.strings.seoEditorRole],"cta-link":t.$links.getPricingUrl("access-control","access-control-upsell"),"button-text":t.strings.ctaButtonText,"learn-more-link":t.$links.getUpsellUrl("access-control",null,"home")},scopedSlots:t._u([{key:"header-text",fn:function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]},proxy:!0},{key:"description",fn:function(){return[t._v(" "+t._s(t.strings.tooltip)+" ")]},proxy:!0}])})],1)],1)},i=[],o=e("9155"),a={mixins:[o["a"]],data:function(){return{strings:{wpRoles:this.$t.__("WP Roles (Editor, Author)",this.$td),seoManagerRole:this.$t.__("SEO Manager Role",this.$td),seoEditorRole:this.$t.__("SEO Editor Role",this.$td),defaultSettings:this.$t.__("Default settings that just work",this.$td),granularControl:this.$t.__("Granular controls per role",this.$td),ctaButtonText:this.$t.__("Upgrade to Pro and Unlock Access Control",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Access Control is only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro")}}}},r=a,l=(e("f689"),e("2877")),c=Object(l["a"])(r,n,i,!1,null,null,null);s["default"]=c.exports},7214:function(t,s,e){"use strict";e("5acb")},8498:function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-general-settings"},[t.settings.showSetupWizard&&t.$allowed("aioseo_setup_wizard")?e("core-getting-started"):t._e(),e("core-card",{attrs:{slug:"license","header-text":t.strings.license},scopedSlots:t._u([t.$isPro?null:{key:"tooltip",fn:function(){return[e("div",{domProps:{innerHTML:t._s(t.tooltipText)}}),e("br"),e("div",{staticClass:"more-tooltip-text",domProps:{innerHTML:t._s(t.moreToolTipText)}})]},proxy:!0}],null,!0)},[e("settings-license-key"),!t.settings.showSetupWizard&&t.$allowed("aioseo_setup_wizard")?e("core-settings-row",{attrs:{name:t.strings.setupWizard},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-button",{attrs:{type:"blue",size:"medium",tag:"a",href:t.$aioseo.urls.aio.wizard}},[e("svg-rocket"),t._v(" "+t._s(t.strings.relaunchSetupWizard)+" ")],1),e("p",{staticClass:"aioseo-description"},[t._v(t._s(t.strings.setupWizardText))])]},proxy:!0}],null,!1,2504899611)}):t._e()],1)],1)},i=[],o=e("5530"),a=(e("9911"),e("2f62")),r={data:function(){return{strings:{license:this.$t.__("License",this.$td),boldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","All in One SEO",this.$t.__("Free",this.$td)),purchasedBoldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","All in One SEO",this.$t.__("Pro",this.$td)),linkText:this.$t.sprintf(this.$t.__("upgrading to %1$s",this.$td),"Pro"),moreBoldText:this.$t.sprintf("<strong>%1$s</strong>","50% "+this.$t.__("off",this.$td)),setupWizard:this.$t.__("Setup Wizard",this.$td),relaunchSetupWizard:this.$t.__("Relaunch Setup Wizard",this.$td),setupWizardText:this.$t.sprintf(this.$t.__("Use our configuration wizard to properly set up %1$s with your WordPress website.",this.$td),"All in One SEO")}}},computed:Object(o["a"])(Object(o["a"])({},Object(a["c"])(["settings"])),{},{link:function(){return this.$t.sprintf('<strong><a href="%1$s" target="_blank">%2$s</a></strong>',this.$links.utmUrl("general-settings","license-box-tooltip"),this.strings.linkText)},tooltipText:function(){return this.$t.sprintf(this.$t.__("To unlock more features, consider %1$s.",this.$td),this.link)},moreToolTipText:function(){return this.$t.sprintf(this.$t.__("As a valued user you receive %1$s, automatically applied at checkout!",this.$td),this.strings.moreBoldText)}})},l=r,c=(e("eada"),e("2877")),d=Object(c["a"])(l,n,i,!1,null,null,null);s["default"]=d.exports},9155:function(t,s,e){"use strict";e.d(s,"a",(function(){return o}));var n=e("5530"),i=(e("99af"),e("d81d"),e("b64b"),e("2f62")),o={data:function(){return{roles:[{label:this.$t.__("Administrator",this.$td),name:"administrator",description:this.$t.sprintf(this.$t.__("By default Admins have access to %1$sall SEO site settings%2$s",this.$td),"<strong>","</strong>")},{label:this.$t.__("Editor",this.$td),name:"editor",description:this.$t.sprintf(this.$t.__("By default Editors have access to %1$sSEO settings for General Settings, Search Appearance and Social Networks, as well as all settings for individual pages and posts.%2$s",this.$td),"<strong>","</strong>")},{label:this.$t.__("Author",this.$td),name:"author",description:this.$t.sprintf(this.$t.__("By default Authors have access to %1$sSEO settings for individual pages and posts that they already have permission to edit.%2$s",this.$td),"<strong>","</strong>")},{label:this.$t.__("SEO Manager",this.$td),name:"seoManager",description:this.$t.sprintf(this.$t.__("By default SEO Managers have access to %1$sSEO settings for General Settings, Redirections, and individual pages and posts.%2$s",this.$td),"<strong>","</strong>")},{label:this.$t.__("SEO Editor",this.$td),name:"seoEditor",description:this.$t.sprintf(this.$t.__("By default SEO Editors have access to %1$sSEO settings for individual pages and posts.%2$s",this.$td),"<strong>","</strong>")}],strings:{tooltip:this.$t.sprintf(this.$t.__("By default, only users with an Administrator role have permission to manage %1$s within your WordPress admin area. With Access Controls, though, you can easily extend specific access permissions to other user roles.",this.$td),"All in One SEO"),accessControl:this.$t.__("Access Control Settings",this.$td),useDefaultSettings:this.$t.__("Use Default Settings",this.$td)}}},computed:Object(n["a"])(Object(n["a"])({},Object(i["c"])(["settings"])),{},{getRoles:function(){var t=this;return this.roles.concat(Object.keys(this.$aioseo.user.customRoles).map((function(s){return{label:t.$aioseo.user.roles[s],name:s,description:t.$t.sprintf(t.$t.__("By default the %1$s role %2$shas no access%3$s to %4$s settings.",t.$td),t.$aioseo.user.roles[s],"<strong>","</strong>","All in One SEO"),dynamic:!0}})))}})}},9313:function(t,s,e){},a97e:function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-rss-content"},[e("core-card",{attrs:{slug:"rssContent","header-text":t.strings.rssContent},scopedSlots:t._u([{key:"tooltip",fn:function(){return[e("div",[t._v(t._s(t.strings.tooltip))])]},proxy:!0}])},[e("div",{staticClass:"aioseo-settings-row aioseo-section-description"},[t._v(" "+t._s(t.strings.description)+" "),e("span",{domProps:{innerHTML:t._s(t.$links.getDocLink(t.$constants.GLOBAL_STRINGS.learnMore,"rssContent",!0))}})]),e("core-settings-row",{attrs:{name:t.$constants.GLOBAL_STRINGS.preview,align:""},scopedSlots:t._u([{key:"content",fn:function(){return[e("base-button",{attrs:{size:"medium",type:"blue",tag:"a",href:t.$aioseo.urls.rssFeedUrl,target:"_blank"}},[e("svg-external"),t._v(" "+t._s(t.strings.openYourRssFeed)+" ")],1)]},proxy:!0}])}),e("core-settings-row",{attrs:{name:t.strings.rssBeforeContent},scopedSlots:t._u([{key:"content",fn:function(){return[e("core-html-tags-editor",{attrs:{checkUnfilteredHtml:"","minimum-line-numbers":5,"tags-context":"rss","default-tags":["post_link","site_link","author_link"]},model:{value:t.options.rssContent.before,callback:function(s){t.$set(t.options.rssContent,"before",s)},expression:"options.rssContent.before"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.beforeRssDescription)+" ")])]},proxy:!0}])}),e("core-settings-row",{attrs:{name:t.strings.rssAfterContent},scopedSlots:t._u([{key:"content",fn:function(){return[e("core-html-tags-editor",{attrs:{checkUnfilteredHtml:"","minimum-line-numbers":5,"tags-context":"rss","default-tags":["post_link","site_link","author_link"]},model:{value:t.options.rssContent.after,callback:function(s){t.$set(t.options.rssContent,"after",s)},expression:"options.rssContent.after"}}),e("div",{staticClass:"aioseo-description"},[t._v(" "+t._s(t.strings.afterRssDescription)+" ")])]},proxy:!0}])})],1)],1)},i=[],o=e("5530"),a=e("2f62"),r={data:function(){return{strings:{tooltip:this.$t.__("Automatically add content to your site's RSS feed.",this.$td),description:this.$t.__("This feature is used to automatically add content to your site's RSS feed. More specifically, it allows you to add links back to your blog and your blog posts so scrapers will automatically add these links too. This helps search engines identify you as the original source of the content.",this.$td),learnMore:this.$t.__("Learn more",this.$td),rssContent:this.$t.__("RSS Content Settings",this.$td),openYourRssFeed:this.$t.__("Open Your RSS Feed",this.$td),rssBeforeContent:this.$t.__("RSS Before Content",this.$td),rssAfterContent:this.$t.__("RSS After Content",this.$td),beforeRssDescription:this.$t.__("Add content before each post in your site feed.",this.$td),afterRssDescription:this.$t.__("Add content after each post in your site feed.",this.$td),unfilteredHtmlError:this.$t.sprintf(this.$t.__("Your user account role does not have access to edit this field. %1$s",this.$td),this.$links.getDocLink(this.$constants.GLOBAL_STRINGS.learnMore,"unfilteredHtml",!0))}}},computed:Object(o["a"])({},Object(a["e"])(["options"]))},l=r,c=(e("e5f0"),e("2877")),d=Object(c["a"])(l,n,i,!1,null,null,null);s["default"]=d.exports},e5f0:function(t,s,e){"use strict";e("1b7a")},eada:function(t,s,e){"use strict";e("20b1")},edbf:function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"aioseo-access-control"},[t.isUnlicensed?t._e():e("access-control"),t.isUnlicensed?e("access-control-lite"):t._e()],1)},i=[],o=e("5530"),a=e("2f62"),r=e("4d07"),l=e("61c3"),c={components:{AccessControl:r["default"],AccessControlLite:l["default"]},computed:Object(o["a"])({},Object(a["c"])(["isUnlicensed"]))},d=c,u=e("2877"),p=Object(u["a"])(d,n,i,!1,null,null,null);s["default"]=p.exports},f689:function(t,s,e){"use strict";e("3562")},f856:function(t,s,e){"use strict";e.r(s);var n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("core-main",{attrs:{"page-name":t.strings.pageName}},[e(t.$route.name,{tag:"component"})],1)},i=[],o=(e("2362"),e("edbf")),a=e("5ee0"),r=e("3a05"),l=e("8498"),c=e("a97e"),d=e("ead6"),u={components:{AccessControl:o["default"],Advanced:a["default"],Breadcrumbs:r["default"],GeneralSettings:l["default"],RssContent:c["default"],WebmasterTools:d["default"]},data:function(){return{strings:{pageName:this.$t.__("General Settings",this.$td)}}}},p=u,h=e("2877"),g=Object(h["a"])(p,n,i,!1,null,null,null);s["default"]=g.exports}}]);