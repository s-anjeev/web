function downloadPDF() {
    // Get the container element
    const container = document.querySelector('.container');

    // Use HTML2Canvas to capture the content of the container as an image
    html2canvas(container).then(canvas => {
        // Convert the canvas to a data URL
        const imgData = canvas.toDataURL('image/png');

        // Initialize jsPDF
        const pdf = new jsPDF('p', 'mm', 'a4');

        // Add the image to the PDF
        pdf.addImage(imgData, 'PNG', 0, 0, 210, 297); // Adjust dimensions as needed

        // Save the PDF
        pdf.save('content.pdf');
    });
}
downloadPDF()