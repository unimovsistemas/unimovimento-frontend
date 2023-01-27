/**
* BrClear CKEditor plugin
* @author Jacques Malgrange <contacter@boiteasite.fr> - 2015 - MIT License
*/
(function(){
	var brclearCmd={
		canUndo:true,
		exec:function(editor){
			var brcl=editor.document.createElement('div',{attributes:{style:'clear:both;height:0;'}});
			editor.insertElement(brcl);
		},
		html:'<div style="clear:both;height:0;"></div>'
	};
	CKEDITOR.plugins.add('brclear',{
		lang:'en,es,fr',
		init:function(editor){
			editor.addCommand('brclear',brclearCmd);
			editor.ui.addButton('brclear',{
				icon:this.path+'brclear.png',
				command:'brclear',
				toolbar:'cleanup',
				title:editor.lang.brclear.title
			});
		}
	});
})();
