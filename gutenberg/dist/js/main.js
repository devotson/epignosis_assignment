!function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){e.exports=n(1)},function(e,t){var n=wp.blocks.registerBlockType,r=wp.blockEditor,a=r.MediaUpload,o=r.RichText,c=r.InspectorControls,l=wp.components,u=l.PanelBody,i=l.IconButton;n("assessment/header",{title:"Assessment - Header",category:"media",icon:"heading",description:"Custom Header Block ",keywords:["header"],attributes:{title:{type:"string",source:"html",selector:"h2"},abovetitletxt:{type:"string",source:"html",selector:"p"},backgroundImage:{type:"string",default:null}},edit:function(e){var t=e.attributes,n=e.setAttributes,r=t.title,l=t.abovetitletxt,d=t.backgroundImage;return[React.createElement(c,{style:{marginBottom:"40px"}},React.createElement(u,{title:"Background Image Settings"},React.createElement("p",null,React.createElement("strong",null,"Select a Background Image:")),React.createElement(a,{onSelect:function(e){n({backgroundImage:e.sizes.full.url})},type:"image",value:d,render:function(e){var t=e.open;return React.createElement(i,{className:"editor-media-placeholder__button is-button is-default is-large",icon:"upload",onClick:t},"Background Image")}}))),React.createElement("div",{class:"header-wrapper",style:{backgroundImage:"url(".concat(d,")"),backgroundSize:"cover",backgroundPosition:"center",backgroundRepeat:"no-repeat"}},React.createElement(o,{key:"editable",tagName:"p",placeholder:"Above Title Text",value:l,onChange:function(e){n({abovetitletxt:e})}}),React.createElement(o,{key:"editable",tagName:"h2",placeholder:"Header Title",value:r,onChange:function(e){n({title:e})}}))]},save:function(e){var t=e.attributes,n=t.title,r=t.abovetitletxt,a=t.backgroundImage;return React.createElement("div",{class:"header-wrapper",style:{backgroundImage:"url(".concat(a,")"),backgroundSize:"cover",backgroundPosition:"center",backgroundRepeat:"no-repeat"}},React.createElement(o.Content,{tagName:"p",value:r}),React.createElement("h2",null,n))}})}]);