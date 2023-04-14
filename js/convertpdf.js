var element = document.getElementById('exportPdf');
      var opt = {
        margin: 1,
        filename: 'pdf.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2,
          dpi: 300
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait'
        }
      };

      function exportPdf() {
        html2pdf().set(opt).from(element).save(); 
      }
