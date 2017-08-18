# nl.schreeuwomleven.paymentreference

Het betalingskenmerk (Paymentreference) is een code die op een acceptgiro wordt afgedrukt om een gift te kunnen identificeren.
Het bevat echter ook een controle getal. Deze extensie berekent het betalingskenmerk aan de hand van het contact id 
voegt het toe als custom field in het contact. (Custom field wordt bij de installatie toegevoegd).
Daarnaast kunnen al bestaande relaties voorzien worden van een kenmerk een bijgeleverde Job.

Voer deze uit met:

```
drush cvapi Job.update_payment_reference
```

