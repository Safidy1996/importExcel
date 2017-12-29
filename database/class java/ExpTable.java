/***********************************************************************
 * Module:  ExpTable.java
 * Author:  rrakoton
 * Purpose: Defines the Class ExpTable
 ***********************************************************************/

import java.util.*;

/** @pdOid 05b1203c-934e-4150-92e1-1b2d1ddebfe4 */
public class ExpTable {
   /** @pdOid be1c6c69-69ac-42e0-ade7-e54417248e26 */
   public int idExpTable;
   /** @pdOid b5a5b1dc-02a9-401c-a9c5-95811714000a */
   public java.lang.String nomExpTable;
   
   /** Une rêgle pour une table */
   /** @pdRoleInfo migr=no name=RegleValidation assc=etreDansUneTable coll=java.util.Collection impl=java.util.HashSet mult=0..* */
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
         newRegleValidation.setExpTable(this);      
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
            oldRegleValidation.setExpTable((ExpTable)null);
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
            oldRegleValidation.setExpTable((ExpTable)null);
         }
      }
   }

}