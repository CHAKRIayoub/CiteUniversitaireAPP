$.fn.exportExcel = function(data){
	if (typeof data !== 'undefined' && data.length > 0){
  	$("#dvjson").excelexportjs({
	    containerid: "dvjson", 
	    datatype: 'json', 
	    dataset: data, 
	    columns: getColumns(data)     
    });
  }
}

$.fn.exportPdf = function( urlImage, fileName, titre, Table, columns,
 columnsToAdd, data)
{	
  if (typeof data !== 'undefined' && data.length > 0){
    var img = new Image;
    img.onload = function() {
    	var doc = new jsPDF();
      doc.addImage(this, 10, 10, 192, 30);
      doc.setFontSize(12);
      doc.text("Cité Universitaires Tétouan", 75, 42);
      doc.setFontSize(16);
      doc.setTextColor(100);
      doc.text(titre, 14, 70);
      var res = doc.autoTableHtmlToJson(document.getElementById(""+Table+""));
      columnsToAdd.forEach(element => {
        res.columns.push(element)
      });
      columns.forEach(element => {
         delete res.columns[element]
      });
      res.data = [] 
      doc.autoTable(res.columns,data,{startY: 80,theme: 'grid'});
      doc.save(fileName);
    };
    img.src = urlImage;   
  }
}