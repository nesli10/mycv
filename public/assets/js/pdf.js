
function pdf() {
    html2canvas(document.body).then(canvas => {
        let imgData = canvas.toDataURL(
            'image/png');
        let doc = new jsPDF('p', 'mm', 'a4');
        doc.addImage(imgData, 'PNG', 0,0,210,297);
        doc.save('cv.pdf');

    });
}
