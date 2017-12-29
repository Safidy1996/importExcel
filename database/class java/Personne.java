/***********************************************************************
 * Module:  Personne.java
 * Author:  rrakoton
 * Purpose: Defines the Class Personne
 ***********************************************************************/

import java.util.*;

/** @pdOid 7a50ff8c-d5ce-48c9-8319-7e099907b291 */
public class Personne {
   /** @pdOid dab73d26-4f2e-4f35-bfa3-52fb4bbc0a0c */
   public int idPersonne;
   /** @pdOid c68bcd4d-c65c-43f9-84c7-bd1cee636984 */
   public java.lang.String nomPersonne;
   /** @pdOid 20a811d7-f8a7-4e28-b3fe-de0ca8f62d1f */
   public java.lang.String prenomPersonne;
   /** @pdOid ef95cd5b-473e-4e82-8085-4d0fdf731fbd */
   public float dettePersonne;
   /** @pdOid 4735e998-4963-4499-9725-0659b5d99d6a */
   public float creancePersonne;
   
   /** @pdRoleInfo migr=no name=EtatLigne assc=tableEtatLigne mult=1..1 side=A */
   public EtatLigne etatLigne;
   
   
   /** @pdGenerated default parent getter */
   public EtatLigne getEtatLigne() {
      return etatLigne;
   }
   
   /** @pdGenerated default parent setter
     * @param newEtatLigne */
   public void setEtatLigne(EtatLigne newEtatLigne) {
      if (this.etatLigne == null || !this.etatLigne.equals(newEtatLigne))
      {
         if (this.etatLigne != null)
         {
            EtatLigne oldEtatLigne = this.etatLigne;
            this.etatLigne = null;
            oldEtatLigne.removePersonne(this);
         }
         if (newEtatLigne != null)
         {
            this.etatLigne = newEtatLigne;
            this.etatLigne.addPersonne(this);
         }
      }
   }

}