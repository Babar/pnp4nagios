Name:         pnp4nagios
Version:      0.6.13
Release:      2%{?dist}
License:      GNU Public License version 2
Packager:     Olivier Raginel <babar@cern.ch>
Vendor:       PNP4nagios team
URL:          http://pnp4nagios.org
Prefix:       /opt/pnp4nagios
Source:       http://github.com/Babar/pnp4nagios/tarball/%{name}-%{version}.tar.gz
Group:        Applications/Monitoring
Requires:     perl(Gearman::Worker), perl(Crypt::Rijndael)
BuildRoot:    %{_tmppath}/%{name}-%{version}-root-%(%{__id_u} -n)
Summary:      Gearman version of pnp4nagios
Provides:     pnp4nagios

%description
From the web page (http://docs.pnp4nagios.org/pnp-0.6/start):

PNP is an addon to Nagios which analyzes performance data provided by plugins
and stores them automatically into RRD-databases (Round Robin Databases, see
RRD Tool).

This is the version with support for Gearman, suitable to use with mod_gearman.

%prep
%setup -q

%build
%configure \
    --with-nagios-user=icinga \
    --with-nagios-group=icinga \
    --prefix=%{_prefix} \
    --libdir=%{_libdir}/%{name} \
    --sysconfdir=%{_sysconfdir}/%{name} \
    --localstatedir=%{_localstatedir} \
    --mandir=%{_mandir} \
    --with-init-dir=%{_initrddir} \
    --with-layout=debian

%{__make} all

%install
%{__rm} -rf %{buildroot}
mkdir -p %{buildroot}/%{_prefix}

%{__make} install fullinstall DESTDIR=%{buildroot} INIT_OPTS= INSTALL_OPTS=

%clean
rm -rf ${buildroot}

%post -p /sbin/ldconfig
%postun -p /sbin/ldconfig

%files
%defattr(-,root,root)
%docdir %{_defaultdocdir}
%{_prefix}
%{_sysconfdir}
%defattr(-,nagios,root)
%{_localstatedir} 

%changelog
* Fri Jul 01 2011 Olivier Raginel <babar@cern.ch>
- Tweaks for latest 0.6.13 version
* Wed Oct 21 2010 Olivier Raginel <babar@cern.ch>
- First build
