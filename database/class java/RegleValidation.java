/***********************************************************************
 * Module:  RegleValidation.java
 * Author:  rrakoton
 * Purpose: Defines the Class RegleValidation
 ***********************************************************************/

import java.util.*;

/** Cette table consiste à mettre les rêgles mise en place place par l'utilisateur
 * 
 * @pdOid 0e1bf2c6-9cba-4046-ab7d-892c10e30eb8 */
public class RegleValidation {
   /** @pdOid 019d9d11-579d-48a1-8317-dfa75a8068ad */
   public int idRegleValidation;
   /** @pdOid bbee1b06-3816-4434-8747-9185d3d645f2 */
   public java.lang.String valeurRegleValidation;
   /** @pdOid 2bcaf184-98fa-4e1b-821a-28e2d873f74d */
   public java.util.Date dateRegleValidation;
   
   /** @pdRoleInfo migr=no name=Utilisateur assc=poserRegle mult=1..1 side=A */
   public Utilisateur utilisateur;
   /** Une rêgle pour une table */
   /** @pdRoleInfo migr=no name=ExpTable assc=etreDansUneTable mult=1..1 side=A */
   public ExpTable expTable;
   
   
   /** @pdGenerated default parent getter */
   public Utilisateur getUtilisateur() {
      return utilisateur;
   }
   
   /** @pdGenerated default parent setter
     * @param newUtilisateur */
   public void setUtilisateur(Utilisateur newUtilisateur) {
      if (this.utilisateur == null || !this.utilisateur.equals(newUtilisateur))
      {
         if (this.utilisateur != null)
         {
            Utilisateur oldUtilisateur = this.utilisateur;
            this.utilisateur = null;
            oldUtilisateur.removeRegleValidation(this);
         }
         if (newUtilisateur != null)
         {
            this.utilisateur = newUtilisateur;
            this.utilisateur.addRegleValidation(this);
         }
      }
   }
   /** @pdGenerated default parent getter */
   public ExpTable getExpTable() {
      return expTable;
   }
   
   /** @pdGenerated default parent setter
     * @param newExpTable */
   public void setExpTable(ExpTable newExpTable) {
      if (this.expTable == null || !this.expTable.equals(newExpTable))
      {
         if (this.expTable != null)
         {
            ExpTable oldExpTable = this.expTable;
            this.expTable = null;
            oldExpTable.removeRegleValidation(this);
         }
         if (newExpTable != null)
         {
            this.expTable = newExpTable;
            this.expTable.addRegleValidation(this);
         }
      }
   }

}