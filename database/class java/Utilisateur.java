/***********************************************************************
 * Module:  Utilisateur.java
 * Author:  rrakoton
 * Purpose: Defines the Class Utilisateur
 ***********************************************************************/

import java.util.*;

/** @pdOid 87255288-3735-414e-83cb-5d65581b73ed */
public class Utilisateur {
   /** @pdOid d812f442-3639-4220-ad12-735535220dc7 */
   public int idUtilisateur;
   /** @pdOid 8ee3023c-ef7f-4c53-916a-5045a7900db4 */
   public java.lang.String nomUtilisateur;
   /** @pdOid 6d1fa57d-6fa1-40a3-aa6f-cf5f5ff7761b */
   public java.lang.String prenomUtilisateur;
   /** @pdOid c9b7c0b8-477c-4691-834f-f71410c275b8 */
   public java.lang.String mailUtilisateur;
   /** @pdOid aa5d059f-eebb-4529-955a-a9d57f871757 */
   public java.lang.String sexeUtilisateur;
   /** @pdOid a2fd7627-adf3-44de-9a1c-ad0c2aa0823a */
   public java.lang.String mdpUtilisateur;
   
   /** @pdRoleInfo migr=no name=RegleValidation assc=poserRegle coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<RegleValidation> regleValidation;
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<RegleValidation> getRegleValidation() {
      if (regleValidation == null)
         regleValidation = new java.util.HashSet<RegleValidation>();
      return regleValidation;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorRegleValidation() {
      if (regleValidation == null)
         regleValidation = new java.util.HashSet<RegleValidation>();
      return regleValidation.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newRegleValidation */
   public void setRegleValidation(java.util.Collection<RegleValidation> newRegleValidation) {
      removeAllRegleValidation();
      for (java.util.Iterator iter = newRegleValidation.iterator(); iter.hasNext();)
         addRegleValidation((RegleValidation)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newRegleValidation */
   public void addRegleValidation(RegleValidation newRegleValidation) {
      if (newRegleValidation == null)
         return;
      if (this.regleValidation == null)
         this.regleValidation = new java.util.HashSet<RegleValidation>();
      if (!this.regleValidation.contains(newRegleValidation))
      {
         this.regleValidation.add(newRegleValidation);
         newRegleValidation.setUtilisateur(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldRegleValidation */
   public void removeRegleValidation(RegleValidation oldRegleValidation) {
      if (oldRegleValidation == null)
         return;
      if (this.regleValidation != null)
         if (this.regleValidation.contains(oldRegleValidation))
         {
            this.regleValidation.remove(oldRegleValidation);
            oldRegleValidation.setUtilisateur((Utilisateur)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllRegleValidation() {
      if (regleValidation != null)
      {
         RegleValidation oldRegleValidation;
         for (java.util.Iterator iter = getIteratorRegleValidation(); iter.hasNext();)
         {
            oldRegleValidation = (RegleValidation)iter.next();
            iter.remove();
            oldRegleValidation.setUtilisateur((Utilisateur)null);
         }
      }
   }

}