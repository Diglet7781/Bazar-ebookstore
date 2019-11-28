function SetBilling(checked) {  
          if (checked) {  
                    document.getElementById('BillingAddress').value = document.getElementById('ShippingAddress').value;   
                    document.getElementById('BillingCity').value = document.getElementById('ShippingCity').value;   
                    document.getElementById('BillingState').value = document.getElementById('ShippingState').value;   
                    document.getElementById('BillingZip').value = document.getElementById('ShippingZip').value;   
                    document.getElementById('BillingCountry').value = document.getElementById('ShippingCountry').value;   
          } else {  
                    document.getElementById('BillingAddress').value = '';   
                    document.getElementById('BillingCity').value = '';   
                    document.getElementById('BillingState').value = '';   
                    document.getElementById('BillingZip').value = '';   
                    document.getElementById('BillingCountry').value = '';   
          }  
}  