/***********************************************************************
 * Module:  EtatLigne.java
 * Author:  rrakoton
 * Purpose: Defines the Class EtatLigne
 ***********************************************************************/

import java.util.*;

/** @pdOid 136cfb01-d684-4808-a85d-a1c2f259e982 */
public class EtatLigne {
   /** @pdOid bed818bf-c72b-4762-94b2-dd0ff02632c4 */
   public int idEtatLigne;
   /** @pdOid 460b0d5f-247a-42d6-a555-49047e63a42b */
   public java.lang.String libelleEtatLigne;
   
   /** @pdRoleInfo migr=no name=Personne assc=tableEtatLigne coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<Personne> personne;
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<Personne> getPersonne() {
      if (personne == null)
         personne = new java.util.HashSet<Personne>();
      return personne;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorPersonne() {
      if (personne == null)
         personne = new java.util.HashSet<Personne>();
      return personne.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newPersonne */
   public void setPersonne(java.util.Collection<Personne> newPersonne) {
      removeAllPersonne();
      for (java.util.Iterator iter = newPersonne.iterator(); iter.hasNext();)
         addPersonne((Personne)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newPersonne */
   public void addPersonne(Personne newPersonne) {
      if (newPersonne == null)
         return;
      if (this.personne == null)
         this.personne = new java.util.HashSet<Personne>();
      if (!this.personne.contains(newPersonne))
      {
         this.personne.add(newPersonne);
         newPersonne.setEtatLigne(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldPersonne */
   public void removePersonne(Personne oldPersonne) {
      if (oldPersonne == null)
         return;
      if (this.personne != null)
         if (this.personne.contains(oldPersonne))
         {
            this.personne.remove(oldPersonne);
            oldPersonne.setEtatLigne((EtatLigne)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllPersonne() {
      if (personne != null)
      {
         Personne oldPersonne;
         for (java.util.Iterator iter = getIteratorPersonne(); iter.hasNext();)
         {
            oldPersonne = (Personne)iter.next();
            iter.remove();
            oldPersonne.setEtatLigne((EtatLigne)null);
         }
      }
   }

}